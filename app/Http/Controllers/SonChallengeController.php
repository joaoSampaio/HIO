<?php namespace App\Http\Controllers;

use App;
use App\Jobs\ProcessVideo;
use App\Model\Challenge;
use App\Model\CustomFilterRotate;
use App\Model\FileHio;
use App\Model\LikedChallengeNotification;
use App\Model\Notification;
use App\Model\ProofApproval;
use Carbon\Carbon;
use App\Model\NotificationManager;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Input;
use Intervention\Image\Facades\Image;
use Log;
use Auth;
use Mail;
use Storage;
use App\Model\User;
use App\Model\FileViews;
use App\Model\FileLikes;
use DateTime;
use Facebook;
use App\Http\Requests\FileFormRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video;
use App\Model\CustomVideo;
use Illuminate\Support\Facades;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


class SonChallengeController extends Controller {



    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */


    public function __construct()
    {
        //$this->middleware('publico');
    }

    public function showSonChallenge($uuid, $file_id){

        if (Auth::check() && $challenge = FileViews::find( $file_id . Auth::user()->id)) {

        }else if(Auth::check()){
            $fileViews = new FileViews(array(
                'user_id' =>  Auth::user()->id, 'file_id' => $file_id, 'id' =>  $file_id . Auth::user()->id

            ));
            $fileViews->save();
            if ($file = FileHio::find($file_id)) {
                $file->views = $file->views + 1;
                $file->save();

                Cache::forget('views-proof-'.$file_id);
                Cache::forever('views-proof-'.$file_id, $file->views);

            }
        }

        $sonChallenge = DB::table('files')->where('files.id', $file_id)
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid', 'challenges.deadLine', 'challenges.id as id_challenge', 'challenges.judged')
            ->first();

        if($sonChallenge == null){
            abort(404, 'Challenge has ended');
        }

        $hasLiked = false;
        if (Auth::check()) {
            $userId = Auth::user()->id;
            //rever esta mal
            $like = Cache::rememberForever('has-liked-'.$userId.'-'.$file_id, function() use ($file_id, $userId) {
//                echo " entrou aqui---------------------------".'has-liked-'.$userId.'-'.$file_id;
                return FileLikes::find( $file_id . Auth::user()->id);
            });
            if($like)
                $hasLiked = true;
        }


        $canApprove = false;

        if (Auth::check() && Auth::user()->id != $sonChallenge->user_id){
            $hasJudged = Cache::rememberForever('has-judged-'.Auth::user()->id.'-'.$file_id, function() use ($file_id) {
                return ProofApproval::getProofApproval(Auth::user()->id, $file_id) != null;
            });
            if(!$hasJudged){
                $now = Carbon::now();

                $deadLine = Carbon::parse($sonChallenge->deadLine);
                $deadLine = $deadLine->addHours(24);
                $isValid = $now < $deadLine;

                if($isValid){
                    $canApprove = true;
                }else{
                    Cache::forget('has-judged-'.Auth::user()->id.'-'.$file_id);
                    Cache::forever('has-judged-'.Auth::user()->id.'-'.$file_id, true);
                }

            }
        }


        $userViews = Cache::rememberForever('views-proof-'.$file_id, function() use ($file_id) {
            return FileViews::where('file_id', $file_id)->count();
        });

        $message = "";
        $timestamp = "";
        $hmac = "";
        $pub_key = "";
        if (Auth::check()){
            $data = array(
                "id" => Auth::user()->id,
                "username" => Auth::user()->name,
                "email" => Auth::user()->email,
                "avatar" => 'https://hiolegends.com/user/photo/'.Auth::user()->id
            );

            $pub_key = env('DISQUS_PUBLIC_KEY');
            $message = base64_encode(json_encode($data));
            $timestamp = time();
            $hmac = $this->dsq_hmacsha1($message . ' ' . $timestamp, env('DISQUS_SECRET_KEY'));
        }

        //findOrFail

//        return json_encode($sonChallenge);
        return view('challengeDetailSon')
            ->with('sonChallenge', $sonChallenge)
            ->with('userViews',$userViews)
            ->with('canApprove',$canApprove)
            ->with('hasLiked',$hasLiked)
            ->with('message',$message)
            ->with('timestamp',$timestamp)
            ->with('hmac',$hmac)
            ->with('pub_key',$pub_key);
    }

    function dsq_hmacsha1($data, $key) {
        $blocksize=64;
        $hashfunc='sha1';
        if (strlen($key)>$blocksize)
            $key=pack('H*', $hashfunc($key));
        $key=str_pad($key,$blocksize,chr(0x00));
        $ipad=str_repeat(chr(0x36),$blocksize);
        $opad=str_repeat(chr(0x5c),$blocksize);
        $hmac = pack(
            'H*',$hashfunc(
                ($key^$opad).pack(
                    'H*',$hashfunc(
                        ($key^$ipad).$data
                    )
                )
            )
        );
        return bin2hex($hmac);
    }

    public function likeFile($file_id){


        $arr = array('status' => false);
        if (Auth::check() && $challenge = FileLikes::find( $file_id . Auth::user()->id)) {

        }else if(Auth::check()) {
            $fileViews = new FileLikes(array(
                'user_id' => Auth::user()->id, 'file_id' => $file_id, 'id' => $file_id . Auth::user()->id
            ));
            $fileViews->save();


            Cache::forget('has-liked-'.Auth::user()->id.'-'.$file_id);
            Cache::forever('has-liked-'.Auth::user()->id.'-'.$file_id, $fileViews);

            if ($file = FileHio::find($file_id)) {
                $file->likes = $file->likes + 1;
                $file->save();
                $arr = array('status' => true, 'count' => $file->likes);

                $notificationManager = new NotificationManager();
                //'recipient_id', 'sender_id', 'unread', 'type', 'parameters', 'reference_id',
                $notification = new LikedChallengeNotification(['recipient_id' =>  $file->user_id, 'sender_id' => Auth::user()->id, 'unread' => 1,
                    'type' => App\Model\Notification::TYPE_LIKED_CHALLENGE, 'parameters' => "", 'reference_id' => $file->id]);
                $notificationManager->add($notification);
            }
        }
        return json_encode($arr);
    }

    public function judgeProof(Request $request){

        $proof_id = $request->get('proof_id');
        $value = $request->get('value');
        if($value <= 0){
            $value = -1;
        }
        if($value < 0){
            $value = 1;
        }

        $arr = array('status' => false);
        if (Auth::check()) {

            if($judgement = ProofApproval::getProofApproval(Auth::user()->id, $proof_id)){

            }else{
                $judgement = new ProofApproval(array(
                    'user_id' => Auth::user()->id, 'proof_id' => $proof_id, 'judgment' => $value
                ));
                $judgement->save();

                Cache::forget('has-judged-'.Auth::user()->id.'-'.$proof_id);
                Cache::forever('has-judged-'.Auth::user()->id.'-'.$proof_id, true);
                $arr = array('status' => true);
            }

        }
        return json_encode($arr);
    }

    public function deleteProof($id)
    {
        $arr = array('status' => false);
        if (Auth::check()) {

            if ($fileHio = FileHio::where('id', $id)->first()) {
                if (Auth::user()->id == $fileHio->user_id) {

                    //need to delete file!!!!
                    File::delete(base_path() . '/public/uploads/challenge/'. $fileHio->filename);
                    FileHio::destroy($id);
                    $arr = array('status' => true);
                }
            }
        }
        return json_encode($arr);
    }

    public function uploadFile(Request $request){

        $challenge_id = $request->get('challenge');

        $challenge = Challenge::findOrFail($challenge_id);
        if($challenge->isClosed()){
            abort(403, 'Challenge has ended');
        }

        $fileNameNoExtensionTemp = md5($request->file('file')->getClientOriginalName(). "temp" . microtime());
        $fileNameNoExtension = md5($request->file('file')->getClientOriginalName() . microtime());

        $extension = $request->file('file')->getClientOriginalExtension();
//        $fileNameTemp = $fileNameNoExtensionTemp . '.' . $extension;
        $fileNameTemp = $fileNameNoExtensionTemp . '.mp4';

        $fileName = $fileNameNoExtension . '.' . $extension;


        $type = 0;

        $mimeType = $request->file('file')->getMimeType();

//        try {
        if (substr($mimeType, 0, 5) == 'image') {
            // this is an image
            $request->file('file')->move(
                base_path() . '/public/uploads/challenge/', $fileName
            );

        } else if (substr($mimeType, 0, 5) == 'video') {

            $type = 1;
            $request->file('file')->move(
                base_path() . '/public/uploads/challenge/', $fileNameTemp
            );

            if (App::environment('local')) {
                $ffmpeg = FFMpeg::create([
                    'ffmpeg.binaries' => 'D:/documents/laravel/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
                    'ffprobe.binaries' => 'D:/documents/laravel/FFmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
                    'timeout' => 3600 // the timeout for the underlying process
                ]);
            } else {
                $ffmpeg = FFMpeg::create([
                    'ffmpeg.binaries' => '/usr/bin/ffmpeg', // the path to the FFMpeg binary
                    'ffprobe.binaries' => '/usr/bin/ffprobe', // the path to the FFProbe binary
                    'timeout' => 3600, // the timeout for the underlying process
                ]);
            }


            $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/' . $fileNameTemp);
            $video->frame(TimeCode::fromSeconds(1))
                ->save(base_path() . '/public/uploads/challenge/' . $fileNameNoExtension . '.jpg');
            $fileName = $fileNameNoExtension . '.mp4';
        }


        $file = new FileHio(array(
            'filename' => $fileName, 'user_id' => Auth::user()->id, 'challenge_id' => $request->get('challenge'),
            'views' => 0, 'likes' => 0, 'type' => $type, 'is_ready' => ($type == 0)? true : false
        ));

        $file->save();

        if($challenge->creator_id != Auth::user()->id) {
            $notificationManager = new NotificationManager();
            //'recipient_id', 'sender_id', 'unread', 'type', 'parameters', 'reference_id',
            $notification = new LikedChallengeNotification(['recipient_id' => $challenge->creator_id, 'sender_id' => Auth::user()->id, 'unread' => 1,
                'type' => App\Model\Notification::TYPE_UPLOAD_CHALLENGE, 'parameters' => $challenge->title, 'reference_id' => $file->id]);
            $notificationManager->add($notification);
        }


        if ($type == 0) {
            return array('status' => "true", 'fileName' => $fileName, 'id' => $file->id);

        } else {
            $this->dispatch((new ProcessVideo($file, $mimeType, $fileNameTemp, $fileNameNoExtension))->onQueue('low'));
            return array('status' => "true", 'fileName' => $fileNameNoExtension . '.jpg', 'id' => $file->id);
        }
    }



    public function isProofReady($uuid, $file_id){
        $arr = array('status' => false);
        if ($file = FileHio::find($file_id)) {
            $arr = array('status' => $file->is_ready);
        }
        return json_encode($arr);

    }


    public function showVoteProofs(){

//files_likes

//        $alreadyVoted = DB::table('proof_approval')->where('user_id', Auth::user()->id)->lists('proof_id');
//
//        echo json_encode($alreadyVoted).'<br><br>';
//        $canVote = DB::table('files')
//            ->whereNotIn('id', $alreadyVoted)
//            ->get();

//        echo "lll:".json_encode($alreadyVoted);

        $dateMigrate = Carbon::now()->subHours(24);
        $proofs = DB::table('files')
            ->where('is_ready','=', 1)
            ->where('user_id', '!=', Auth::user()->id)
            ->whereNotIn('files.id', function ($query)
            {
                $query->from('proof_approval')
                    ->select('proof_id')
                    ->where('user_id', Auth::user()->id);
            })
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
            ->where('deadLine','>=', $dateMigrate)
            ->select('files.*')
            ->get();



//            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
//            ->join('users', 'files.user_id', '=', 'users.id')
//            ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid', 'challenges.deadLine', 'challenges.id as id_challenge', 'challenges.judged')
//            ->get(10);



//        return json_encode($proofs);
        return view('voteProof')
            ->with('proofs', $proofs);


//        return json_encode($canVote);
//        return view('voteProof');
    }



    public function testVideo(){



//  'ffmpeg.binaries' => 'D:/documents/laravel/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
//        'ffprobe.binaries' => 'D:/documents/laravel/FFmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
        $ffmpeg = FFMpeg::create([
            'ffmpeg.binaries' => '/usr/bin/ffmpeg', // the path to the FFMpeg binary
            'ffprobe.binaries' => '/usr/bin/ffprobe', // the path to the FFProbe binary
            'timeout' => 240, // the timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
        ]);
        $ffmpeg->getFFMpegDriver()->listen(new \Alchemy\BinaryDriver\Listeners\DebugListener());
        $ffmpeg->getFFMpegDriver()->on('debug', function ($message) {
            echo $message."<br>";
        });
//
//        $video = $ffmpeg->open(base_path() . '/public/test/mov.mov');
////        $video
////            ->filters()
////            ->resize(new Dimension(320, 240))
////            ->synchronize();
//
//
//
//        $dimension = new \FFMpeg\Coordinate\Dimension(480, 320);
//        $mode = \FFMpeg\Filters\Video\ResizeFilter::RESIZEMODE_INSET;
//        $useStandards = true;
//
//
//        Log::info('before synchronize ----------------------');
//        $video
//            ->filters()
//            ->resize($dimension, $mode, $useStandards)
//            ->synchronize();
//
//        $video
//            ->frame(TimeCode::fromSeconds(10))
//            ->save(base_path() .'/public/test/frame.jpg');
//
//
//        $video
//            ->save(new CustomVideo(), base_path() .'/public/test/export-x264.mp4');
////            ->save(new \FFMpeg\Format\Video\WMV(), base_path() .'/public/test/export-wmv.wmv')
////            ->save(new \FFMpeg\Format\Video\WebM(), base_path() .'/public/test/export-webm.webm');


//        $process = new Process('D:/documents/laravel/ffmpeg/bin/ffmpeg.exe -i '.base_path() . '/public/test/mov.mov'.' '.base_path() .'/public/test/export-x264.mp4'.' -hide_banner');
        //$process = new Process('D:/documents/laravel/ffmpeg/bin/ffmpeg.exe -i '.base_path() . '/public/test/mov.mov'.' -vf scale=480:320 -f mp4 -vcodec libx264 -preset fast -acodec aac '.base_path() .'/public/test/export-x264.mp4'.' -hide_banner');
//        $process = new Process('D:/documents/laravel/ffmpeg/bin/ffmpeg.exe -i '.base_path() . '/public/test/mov.mov'.' -vf scale=480:320,setdar=16:9 -f mp4 -vcodec libx264 -preset fast -acodec aac '.base_path() .'/public/test/export-x264.mp4'.' -hide_banner');


        set_time_limit(0);

//        $filename = 'export-x264_mov_480_90_final.mp4';
        $filename = 'mov.mov';

        $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/c7e66dda83ee39f40435efabc2aa1c1a.MOV');
//        $video = $ffmpeg->open(base_path() . '/public/test/'.$filename);



        $dimension = new \FFMpeg\Coordinate\Dimension(480,320);
        $mode = \FFMpeg\Filters\Video\ResizeFilter::RESIZEMODE_INSET;
        $useStandards = true;

        $format = new CustomVideo();
        $start = microtime(true);
        Log::info('before synchronize ----------------------');
        //->resize($dimension, $mode, $useStandards)

//        $videostream = $ffmpeg->getFFProbe()
//            ->streams(base_path() . '/public/test/'.$filename)
//            ->videos()
//            ->first();

        $encode = true;
//        echo '<br>-----has tags:'.$videostream->has('tags');
//        if ($videostream->has('tags')) {
//            $tags = $videostream->get('tags');
//            if (isset($tags['rotate'])) {
//                $rotate = $tags['rotate'];
//                $rotate = 90;
//                $video
//                    ->filters()
//                    ->resize($dimension, $mode, true);
//                $video->addFilter(new CustomFilterRotate("-metadata:s:v:0",$rotate));
//
//
//                $encode = false;
//            }
//
//        }


//        $video
//            ->filters()
//            ->resize($dimension, $mode, true);
//            ->rotate(\FFMpeg\Filters\Video\RotateFilter::ROTATE_270);


        $format->on('progress', function ($video, $format, $percentage) {
            echo "$percentage % transcoded<<br>";
        });
        $video->save($format, base_path() . '/public/uploads/challenge/rex2.mp4');
//        $video = $ffmpeg->open(base_path() . '/public/test/tmp1.mp4');
//        $rotate = 90;
//        $video->addFilter(new CustomFilterRotate("-metadata:s:v:0",$rotate));
//        $video->save($format, base_path() . '/public/test/after_1_tmp.mp4');

//        if($encode){
//            $video
//                ->filters()
//                ->resize($dimension, $mode, false)
//                ->addMetadata(["title" => "Some Title", "track" => 1]);
//            ;
//        }
//-metadata:s:v:0 rotate=90




// rotate : 90
//        $name = 'export-x264_mov_480_9_1.mp4';
//        $video->save($format, base_path() . '/public/test/'.$name);
//
//        $video = $ffmpeg->open(base_path() . '/public/test/'.$name);
//        $video
//            ->filters()
////            ->rotate(\FFMpeg\Filters\Video\RotateFilter::ROTATE_270)
//            ->resize($dimension, $mode, $useStandards)
//
//            ->synchronize();

//        $video->save($format, base_path() . '/public/test/export-x264_mov_480_7_final.mp4');
        $time_elapsed_secs = microtime(true) - $start;
        echo 'took:' . $time_elapsed_secs . ' seconds ---------------------';

//        $process = new Process('D:/documents/laravel/ffmpeg/bin/ffmpeg.exe -i '.base_path() . '/public/test/mov.mov'.' -vf scale="480:-1" -f mp4 -vcodec libx264 -preset fast -acodec aac '.base_path() .'/public/test/export-x264.mp4'.' -hide_banner');
//
//
//        try {
//            $start = microtime(true);
//            $process->mustRun();
//            $time_elapsed_secs = microtime(true) - $start;
//            echo 'took:' . $time_elapsed_secs . ' seconds ---------------------';
//            echo $process->getOutput();
//        } catch (ProcessFailedException $e) {
//            echo "falhou-----------------------";
//            echo $e->getMessage();
//        }


        return "deu";
    }

}
