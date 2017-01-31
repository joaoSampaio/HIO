<?php namespace App\Http\Controllers;

use App;
use App\Jobs\ProcessVideo;
use App\Model\Challenge;
use App\Model\FileHio;
use App\Model\LikedChallengeNotification;
use App\Model\Notification;
use Carbon\Carbon;
use App\Model\NotificationManager;

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
use App\Model\ChallengeUserAssociation;
use App\Model\User;
use App\Model\FileViews;
use App\Model\FileLikes;
use DateTime;
use Facebook;
use Facebook\FacebookRequest;
use App\Http\Requests\FileFormRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video;
use App\Model\CustomVideo;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades;
use App\Model\Relationship;

use App\Http\Traits\FriendTrait;


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
            }
        }

        $sonChallenge = DB::table('files')->where('files.id', $file_id)
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid')
            ->first();


        $hasLiked = false;
        if (Auth::check() && $like = FileLikes::find( $file_id . Auth::user()->id)) {
            $hasLiked = true;
        }


//        $userViews = 3;
        $userViews = FileViews::where('file_id', $file_id)->count();

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


//        return json_encode($sonChallenge);
        return view('challengeDetailSon')
            ->with('sonChallenge', $sonChallenge)
            ->with('userViews',$userViews)
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


        $arr = array('status' => "false");
        if (Auth::check() && $challenge = FileLikes::find( $file_id . Auth::user()->id)) {

        }else if(Auth::check()) {
            $fileViews = new FileLikes(array(
                'user_id' => Auth::user()->id, 'file_id' => $file_id, 'id' => $file_id . Auth::user()->id
            ));
            $fileViews->save();
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

    public function deleteProof($id)
    {
        $arr = array('status' => "false");
        if (Auth::check()) {

            if ($fileHio = FileHio::where('id', $id)->first()) {
                if (Auth::user()->id == $fileHio->user_id) {

                    //need to delete file!!!!
                    File::delete(base_path() . '/public/uploads/challenge/'. $fileHio->filename);
                    FileHio::destroy($id);
                    $arr = array('status' => "true");
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
        $fileNameTemp = $fileNameNoExtensionTemp . '.' . $extension;

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


        if ($type == 0) {
            return array('status' => "true", 'fileName' => $fileName, 'id' => $file->id);

        } else {
            $this->dispatch(new ProcessVideo($file, $mimeType, $fileNameTemp, $fileNameNoExtension));
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


}
