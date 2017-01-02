<?php namespace App\Http\Controllers;

use App;
use App\Challenge;
use App\FileHio;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Input;
use Log;
use Auth;
use Mail;
use App\ChallengeUserAssociation;
use App\User;
use App\FileViews;
use App\FileLikes;
use DateTime;
use Facebook;
use Facebook\FacebookRequest;
use App\Http\Requests\FileFormRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Format\Video;
use App\CustomVideo;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades;
use App\Relationship;

use App\Http\Traits\FriendTrait;


class HomeController extends Controller {

    use FriendTrait;

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

    private function getPageTotal(){
        return 6;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('publico');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('work');
    }

    public function home()
    {
        //print_r(Auth::user());
        if (Auth::user())
        {
            // Auth::user() returns an instance of the authenticated user...
            $authUser = Auth::user();

            return view('home')->with('authUser', $authUser);
        }
        return view('home')->with('authUser', "");;
    }

    public function contact()
    {

        return view('contact');
    }

    public function storeContact(Request $request) {

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        try{
            $this->sendContactEmail($name, $email, $message);
        }catch (\Exception $e){

        }
        return view('contact')->with('message', 'Thanks for contacting us!');

    }

    public function terms()
    {
        return view('terms');
    }

    public function mission()
    {
        return view('mission');
    }

    public function privatePolicy()
    {
        return view('policy');
    }

    public function userProfile($id, $challengeCreated = false)
    {
        $idUser = $id;
        $user = null;
        $showPrivate = false;
        $now = Carbon::now();
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $user = Auth::user();
            $showPrivate = true;

        } else if ($user = User::where('id', $id)->first()) {

        } else {
            //rever user nao existe
            return view('home')->with('authUser', "");
        }

        $endedChallenges = Challenge::join('challenge_user as po', 'po.challenge_id', '=', 'challenges.id')
            ->where('po.user_id', $idUser)
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->where(function ($query) {
                $now = Carbon::now();
                $query->where('challenges.closed', '=', 1)
                    ->orWhere('challenges.deadLine', '<', $now);
            })
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ended', $page = null);

        $ongoingChallenges = Challenge::join('challenge_user as po', 'po.challenge_id', '=', 'challenges.id')
            ->where('po.user_id', $idUser)
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->where('closed', '=', 0)
            ->where('deadLine', '>', $now)
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);

        $myChallenges = DB::table('challenges')
            ->where('creator_id', $idUser)
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'myChallenges', $page = null);


        $canBeFriend = false;
        if(Auth::check() && Auth::user()->id != $idUser){
            $canBeFriend = $this->canBeFriend($idUser);
        }


        $userFriends = $this->getAllFriends($idUser);


        return view('profile')->with('challenges', $ongoingChallenges)
            ->with('user', $user)
            ->with('endedChallenges', $endedChallenges)
            ->with('challengeCreated', $challengeCreated)
            ->with('myChallenges', $myChallenges)
            ->with('canBeFriend', $canBeFriend)
            ->with('userFriends', $userFriends);


    }



    public function getUserEndedChallenges($id){

        $idUser = $id;
        $user = null;
        $showPrivate = false;
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $showPrivate = true;

        }else if ($user = User::where('id', $id)->first()) {

        }else{
            //rever user nao existe
            return view('home')->with('authUser', "");
        }

        $endedChallenges = Challenge::join('challenge_user as po', 'po.challenge_id', '=', 'challenges.id')
            ->where('po.user_id', $idUser)
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->where(function ($query) {
                $now = Carbon::now();
                $query->where('challenges.closed', '=', 1)
                    ->orWhere('challenges.deadLine', '<', $now);
            })
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ended', $page = null);


        return json_encode(view('partials.challenge')->with('challenges',$endedChallenges)->render());
    }


    public function getUserCreatedChallenges($id){

        $idUser = $id;
        $user = null;
        $now = Carbon::now();
        $showPrivate = false;
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $showPrivate = true;

        }else if ($user = User::where('id', $id)->first()) {
            $found = true;
        }else{
            //rever user nao existe
            return view('home')->with('authUser', "");
        }


        $myChallenges = DB::table('challenges')
            ->where('creator_id', $idUser)
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'myChallenges', $page = null);


        return json_encode(view('partials.challenge')->with('challenges',$myChallenges)->render());
    }



    public function getUserOngoingChallenges($id){

        $idUser = $id;
        $user = null;
        $now = Carbon::now();
        $showPrivate = false;
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $showPrivate = true;

        }else if ($user = User::where('id', $id)->first()) {
            $found = true;
        }else{
            //rever user nao existe
            return view('home')->with('authUser', "");
        }


        $ongoingChallenges = Challenge::join('challenge_user as po', 'po.challenge_id', '=', 'challenges.id')
            ->where('po.user_id', $idUser)
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->where('closed', '=', 0)
            ->where('deadLine', '>' , $now)
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);


        return json_encode(view('partials.challenge')->with('challenges',$ongoingChallenges)->render());
    }



    public function editProfile()
    {
        return view('edit_profile');
    }

    public function post_editProfile(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->first();
        if ($request->hasFile('file')) {
            $fileNameNoExtension = md5($request->file('file')->getClientOriginalName() . microtime());
            $fileName = $fileNameNoExtension . '.' .
                $request->file('file')->getClientOriginalExtension();

            $type = 0;
            $mimeType = $request->file('file')->getMimeType();
            if(substr($mimeType, 0, 5) == 'image') {
                // this is an image
                $request->file('file')->move(
                    base_path() . '/public/uploads/users/', $fileName
                );
                $user->photo = $fileName;

            }
        }



        $user->about = $request->input('about');

        if(!empty($request->input('sports'))){
            $user->sports = implode (",", $request->input('sports'));
        }else{
            $user->sports = "";
        }


        $user->name = $request->input('name');
        $user->interests = $request->input('interests');


        $user->save();
//        echo 'se o ecrã está todo branco, correu tudo bem.';
        return redirect()->action('HomeController@userProfile', 'me');
    }

    public function createChallenge($userFB = null){
        //$uuid = Uuid::uuid4();

        $category = [
            ''=>'Choose your Category',
            'Awesome Stuff'=>'Awesome Stuff',
            'Basketball'=>'Basketball',
            'Bodyboard'=>'Bodyboard',
            'Boxe'=>'Boxe',
            'Cycling'=>'Cycling',
            'Fitness'=>'Fitness',
            'Football'=>'Football',
            'Golf'=>'Golf',
            'Gym'=>'Gym',
            'Gymnastics'=>'Gymnastics',
            'Hockey'=>'Hockey',
            'Jiu-Jitsu'=>'Jiu-Jitsu',
            'Judo'=>'Judo',
            'Karate'=>'Karate',
            'Kickboxing'=>'Kickboxing',
            'MMA'=>'MMA',
            'Muay Thai'=>'Muay Thai',
            'Rugby'=>'Rugby',
            'Running'=>'Running',
            'Snow Sports'=>'Snow Sports',
            'Surf'=>'Surf',
            'Swimming'=>'Swimming',
            'Taekwondo'=>'Taekwondo',
            'Tennis'=>'Tennis',
            'Trail'=>'Trail',
            'Volleyball'=>'Volleyball',



        ];
        if($userFB != null && $targetUser = User::where('id', $userFB)->first()){
            return View('createChallenge')->with('category', $category)->with('targetUser', $targetUser);
        }else{
            return View('createChallenge')->with('category', $category);
        }


    }

    //no inicio apenas o criador faz parte do desafio, quando as outras pessoas registarem e aceitarem o desafio entao sao adicionadas
    public function storeChallenge(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'category' => 'required',
            'reward' => 'required',
            'penalty' => 'required',
            'deadLine' => 'required',
            'title' => 'required',
        ]);

        $emailsToSend = array();
        $emailsToSendString = array();
        $emails =  $request->input('emailFriend');
//        print_r($emails);
        $challengeMyself = false;
        $total = 0;
        if (is_array($emails) || is_object($emails)) {
            foreach ($emails as $email) {
                if (str_contains($email, '@')) {
                    //envio email
                    $total++;
                    array_push($emailsToSendString, $email);
                } else if (is_numeric($email)) {
                    //pode ser um id facebook
//                if($email == Auth::user()->facebook_id){
//                    $challengeMyself = true;
//
//                }
                    if ($email == Auth::user()->id) {
                        $challengeMyself = true;
//                    $total++;
//                    array_push($emailsToSend, Auth::user());
                    }
                    if ($hioUser = User::where('id', $email)->first()) {
                        $total++;
                        array_push($emailsToSend, $hioUser);
                    }
                }
            }
        }
//        print_r($emailsToSend);




        if(Auth::user()->role == "brand" && $request->input('sendall', false)){
            foreach( $this->getAllFriends(Auth::user()->id) as $user){
                $total++;
                array_push($emailsToSend, $user);
            }
        }


        $title = $request->input('title');
        $creator_id = Auth::user()->id;
        $rank = 0;

        $description = $request->input('description');
        $category = $request->input('category');
        $reward = $request->input('reward');
        $penalty = $request->input('penalty');
        $deadLine = $request->input('deadLine');
        $public = $request->input('public', false);

        if($public){
            $public = 1;
        }
        else{
            $public = 0;
        }
        $uuid = Uuid::uuid4();
        $secret = 0;
        //se for privado
        if($public === 0){
            $secret = mt_rand(1000000,9999999);
        }

        $achievements = Auth::user()->achievements;
        if($achievements == NULL){
            $achievements = array('1create' => 1);
            Auth::user()->achievements = json_encode($achievements);
            Auth::user()->save();
        }else{
            $achievements = json_decode($achievements, true);
            if (!array_key_exists('1create', $achievements)) {
                $achievements['1create'] = 1;
                Auth::user()->achievements = json_encode($achievements);
                Auth::user()->save();
            }
        }

        $challenge = new Challenge(['title' => $title, 'creator_id' => $creator_id, 'rank' => $rank,
            'description' => $description, 'category' => $category, 'reward' => $reward, 'penalty' => $penalty,
            'deadLine' => $deadLine, 'uuid' => $uuid,'public' => $public,'secret' => $secret,]);
        if($challengeMyself){
            Auth::user()->challenges()->save($challenge);
        }else{
            $challenge->save();
        }

//        Auth::user()->challenges()->save($challenge);


        //send post to facebook
        $post_facebook = $request->input('post_facebook', false);
        if ($post_facebook) {
            $link = action('HomeController@challengeDetail', [$uuid]);
            $this->sendLinkToFacebook($link, $description);
        }

        if(($challengeMyself && $total > 1) || !$challengeMyself){
            $this->sendEmail($challenge, $emailsToSend, $total);
        }


        $this->sendEmailString($challenge, $emailsToSendString, $total);
//        echo "...".json_encode($emailsToSend);
        \Session::flash('challengeCreated','true');

        return redirect()->action('HomeController@userProfile', 'me')->with(['challengeCreated' => 'true']);
    }

    public function joinChallenge($uuid)
    {
        $success = false;
        $message = " ";
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {
            Auth::user()->challenges()->save($challenge);
            $success = true;



//            $countVotes = $this->getVoteCount($challenge);


            $creator = $challenge->users()->where('user_id', $challenge->creator_id)->value('name');
            $creator = '<a href="/profile/'.$challenge->creator_id.'">'.$creator . '</a>';
            $peopleParticipating = $challenge->users()->select('name', 'user_id')->get();

            $end = $creator . '<span> is challenging </span>';
            $count = 0;



            $otherPeople = "";
            //$array = array_except($array, ['price']);
            foreach( $peopleParticipating as $people){
                if (  $people->user_id == $challenge->creator_id ){
                    continue;
                }
                $count++;

                if($count > 2){
                    $otherPeople = $otherPeople .' <a href="/profile/'.$people->user_id.'"> '.$people->name . '</a>,';
                }else{
                    $end=  $end  .'<a href="/profile/'.$people->user_id.'"> '.$people->name . '</a>,';
                }
            }
            $end = rtrim($end, ",");

            if(count($peopleParticipating) > 3) {
                $otherPeople = rtrim($otherPeople, ",");
                $end = $end . '  <span>and</span> <span id="showmore" class="label label-info"> ' . (count($peopleParticipating) - 3) .
                    ' other people.</span> <span id="otherpeople" style="display: none;">' . $otherPeople . '</span>';

            }

            $message = $end;

        }
        $arr = array('status' => $success, 'message' => $message);

        return json_encode($arr);

    }

    public function voteChallenge($uuid)
    {
        //preciso de table de votes para que nao seja possivel votar varias vezes

        $success = false;
        $error = "";
        $count = 0;
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            //se nao tiver votado
            if(!$this->getVote($challenge)){
                $vote = new Vote(['user_id' => Auth::user()->id,]);
                $challenge->votes()->save($vote);
                $success = true;
                $count = $challenge->votes()->count();
            }
        }
        $arr = array('status' => $success, 'count' => $count);

        return json_encode($arr);

    }

    public function getVote($challenge) {
        $vote = $challenge->votes()->where('user_id', Auth::user()->id)->first();
        return ($vote) ? $vote : false;
    }

    public function getVoteCount($challenge) {
        $vote = $challenge->votes()->count();
        return $vote;
    }

    private function isUserInChallenge($challenge){
        $user = $challenge->users()->where('user_id', Auth::user()->id)->first();
        return ($user)? true : false;
    }


    public function challengeDetail($uuid, $secret = null)
    {
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            $now = new DateTime();
            $deadLine = new DateTime($challenge->deadLine);
            $isValid = $now < $deadLine;

            $isPublic = false;
            if($challenge->public == 0){
                if($secret != null && $challenge->secret == $secret || $challenge->creator_id == Auth::user()->id){
                    $isPublic = true;
                }
            }else{
                $isPublic = true;
            }

            $participating = false;
            if(Auth::check()){
                $participating = $this->isUserInChallenge($challenge);
            }
            $countVotes = $this->getVoteCount($challenge);
            $creatorUser = User::where('id', $challenge->creator_id)->first();
            $creator = $creatorUser->name;
            $peopleParticipating = $challenge->users()->select('name', 'user_id', 'facebook_id')->get();

            $sonChallenges = $this->getHelperPaginatorSon($challenge->id);

            if($isPublic == 1 || $participating) {
                return view('challengeDetail')->with('challenge', $challenge)->with('isValid', $isValid)
                    ->with('countVotes', $countVotes)->with('participating', $participating)
                    ->with('creator', $creator)->with('peopleParticipating', $peopleParticipating)
                    ->with('sonChallenges', $sonChallenges);
            }else{

                return view('challengeDetail')->with('isPublic', $isPublic);
            }

        }else{
            abort(404);
            return view('challengeDetail')->with('error', $uuid);
        }
    }

    private function getHelperPaginatorSon($id){
        $initialQuantity = 3;
        $loadMore = 4;

        $page = (int) Paginator::resolveCurrentPage();
        $perPage = ($page == 1) ? $initialQuantity : $loadMore;
        $skip = ($page == 1) ? 0 : ($initialQuantity + ($loadMore * ($page - 2)));
        // Get a full collection to be able to calculate the full total all the time
        $total =  DB::table('files')->where('challenge_id', $id)
            ->join('users', 'files.user_id', '=', 'users.id')
            ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
            ->select( 'users.name', 'files.*', 'challenges.title', 'challenges.uuid')->count();
        // Get the correct results


        if(Auth::check() ){
            //ordenar pelos proprios

            $myModelResults = DB::table('files')->where('challenge_id', $id)->where('user_id', Auth::user()->id)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
                ->select( 'users.name', 'files.*', 'challenges.title', 'challenges.uuid')->get();

//            $othersModelResults = DB::table('files')->where('challenge_id', $id)->where('user_id','!=', Auth::user()->id)->get();
            $othersModelResults = DB::table('files')->where('challenge_id', $id)->where('user_id','!=', Auth::user()->id)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
                ->select( 'users.name', 'files.*', 'challenges.title', 'challenges.uuid')->get();

//            echo "myModelResults->".count($myModelResults)."<br>";
//            echo "othersModelResults->".count($othersModelResults)."<br>";
            $modelResults = array_merge($myModelResults, $othersModelResults);
            $modelResults = array_slice($modelResults, $skip, $perPage);
//            echo "modelResults->".count($modelResults)."<br>";
//            echo json_encode($othersModelResults);

        }else{
            $modelResults = DB::table('files')->where('challenge_id', $id)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
                ->select( 'users.name', 'files.*', 'challenges.title', 'challenges.uuid')->skip($skip)->take($perPage)->get();
        }




        $total = $total +1;
        if($page == 1) {
            $copia = new \stdClass;
            $copia->id = -1;
            array_unshift($modelResults, $copia);
        }
        $perPage = 4;
//        echo json_encode($modelResults);

        return new LengthAwarePaginator($modelResults, $total, $perPage);
    }

    public function getSonChallenges($id){

        $participating = false;

        if(Auth::check()){
            if ($challenge = ChallengeUserAssociation::where('challenge_id', $id)->where('user_id', Auth::user()->id)->first()) {
                $participating = true;
            }
        }

        return json_encode(view('partials.multi_son_challenge')->with('participating', $participating)->with('sonChallenges', $this->getHelperPaginatorSon($id))->render());

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

//        $userViews = 3;
        $userViews = FileViews::where('file_id', $file_id)->count();

//        return json_encode($sonChallenge);
        return view('challengeDetailSon')->with('sonChallenge', $sonChallenge)->with('userViews',$userViews);
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
                    FileHio::destroy($id);
                    $arr = array('status' => "true");
                }
            }
        }
        return json_encode($arr);
    }

    public function uploadFile(Request $request){

        $fileNameNoExtension = md5($request->file('file')->getClientOriginalName() . microtime());
        $fileName = $fileNameNoExtension . '.' .
            $request->file('file')->getClientOriginalExtension();

        $type = 0;
        $mimeType = $request->file('file')->getMimeType();
        if(substr($mimeType, 0, 5) == 'image') {
            // this is an image
            $request->file('file')->move(
                base_path() . '/public/uploads/challenge/', $fileName
            );

        }else if(substr($mimeType, 0, 5) == 'video'){

            $type = 1;

            $request->file('file')->move(
                base_path() . '/public/uploads/challenge/', $fileName
            );


            if (App::environment('local')) {
                $ffmpeg = FFMpeg::create([
                    'ffmpeg.binaries'  => 'D:/documents/laravel/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
                    'ffprobe.binaries' => 'D:/documents/laravel/FFmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
                    'timeout'          => 3600 // the timeout for the underlying process
                ]);
            }else{
                $ffmpeg = FFMpeg::create([
                    'ffmpeg.binaries'  => '/usr/bin/ffmpeg', // the path to the FFMpeg binary
                    'ffprobe.binaries' => '/usr/bin/ffprobe', // the path to the FFProbe binary
                    'timeout'          => 3600, // the timeout for the underlying process
                ]);
            }


            $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/'. $fileName);
            $video->frame(TimeCode::fromSeconds(1))
                ->save(base_path() . '/public/uploads/challenge/'. $fileNameNoExtension.'.jpg');

            if($mimeType != 'video/mp4'){
//                $ffmpeg->getFFMpegDriver()->listen(new \Alchemy\BinaryDriver\Listeners\DebugListener());
//                $ffmpeg->getFFMpegDriver()->on('debug', function ($message) {
//                    echo '......aaaa.....'.$message."\n";
//                });
                $fileName = $fileNameNoExtension . '.mp4';
                $format = new CustomVideo();
                $video->save($format, base_path() . '/public/uploads/challenge/'. $fileNameNoExtension . '.mp4');
            }
        }




        $file = new FileHio(array(
            'filename' =>  $fileName, 'user_id' =>  Auth::user()->id, 'challenge_id' =>  $request->get('challenge'),
            'views' =>  0, 'likes' =>  0, 'type' =>  $type
        ));

        $file->save();
        if(substr($mimeType, 0, 5) == 'image') {
            return array('status' => "true", 'fileName' => $fileName, 'id' => $file->id );

        }else {
            return array('status' => "true", 'fileName' => $fileNameNoExtension.'.jpg', 'id' => $file->id );
        }


//        $video
//            ->filters()
//            ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
//            ->synchronize();



//        if ($sonChallenge = ChallengeUserAssociation::where('user_id', Auth::user()->id)->where('challenge_id', $request->get('challenge'))->first()) {
//            if( $sonChallenge->file_id != 0){
//                if ($file = FileHio::where('id', $sonChallenge->file_id)->first()) {
//                    $fileNameDelete = $file->filename;
//                    $file->filename = $fileName;
//                    $file->update();
//                    try{
//                        unlink(base_path() . '/public/uploads/challenge/' . $fileNameDelete);
//                    }catch (\Exception $ex){
//
//                    }
//                }
//            }
//        }



    }

    public function closeChallenge($uuid)
    {
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            $now = new DateTime();
            $deadLine = new DateTime($challenge->deadLine);
            $isValid = $now < $deadLine;
            if ($isValid && Auth::check() && Auth::user()->id == $challenge->creator_id) {
                $challenge->closed = true;
                $challenge->save();


                //
                $sonChallenges = DB::table('files')->where('files.challenge_id', $challenge->id)
                    ->select('files.user_id', DB::raw('count(*) as total'))
                    ->groupBy('files.user_id')
                    ->get();
                foreach ($sonChallenges as $sonChallenge) {
                    if ($user = User::where('id', $sonChallenge->user_id)->first()) {
                        $achievements = $user->achievements;
                        if($achievements == NULL){
                            $achievements = array('totalCompleted' => 1);
                        }else{
                            $achievements = json_decode($achievements, true);
                            if (!array_key_exists('totalCompleted', $achievements)) {
                                $achievements['totalCompleted'] = 1;
                            }else{
                                $achievements['totalCompleted'] = $achievements['totalCompleted']+1;
                            }
                        }
                        Auth::user()->achievements = json_encode($achievements);
                        Auth::user()->save();
                    }
                }

            }
        }
        return redirect()->action('HomeController@challengeDetail', $uuid);
    }

    public function editChallenge($uuid){
        $error = '';
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {
            $now = new DateTime();
            $deadLine = new DateTime($challenge->deadLine);
            $isValid = $now < $deadLine;

            if($challenge->creator_id != Auth::user()->id){
                $error = 'Not authorized';
            }elseif($challenge->closed){
                $error = 'Challenge is closed!';
            }elseif(!$isValid){
                $error = 'Time is over!';
            }else{
                return view('editChallenge')->with('challenge', $challenge);
            }
        }else{
            $error = 'Challenge not found!';
        }
        return view('editChallenge')->with('error', $error);
    }

    public function editStoreChallenge($uuid, Request $request){
        $error = '';
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            if($challenge->creator_id != Auth::user()->id){
                $error = 'Not authorized';
            }elseif($challenge->closed){
                $error = 'Challenge is closed!';
            }else{
//                $challenge->deadLine = $request->input('deadLine');
                $challenge->description =  $request->input('description');
                $challenge->save();
                return redirect()->action('HomeController@challengeDetail', $uuid);
            }
        }else{
            $error = 'Challenge not found!';
        }
        return view('editChallenge')->with('error', $error);
    }


    public function latestChallenges(){

        $now = Carbon::now();
        $latest = DB::table('challenges')->where('closed', '=', 0)
            ->where('deadLine', '>' , $now)
            ->where('public', '=' , 1)
            ->orderBy('deadLine', 'asc')
            ->take(6)->get();
        return json_encode(view('partials.multi_challenge')->with('challenges',$latest)->render());
    }


    public function mostViewed(){

        $latest = DB::table('files')
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')->where('challenges.public', '=' , 1)
            ->join('users', 'files.user_id', '=', 'users.id')
            ->select('users.name','users.id', 'files.id', 'users.facebook_id', 'files.*', 'challenges.title', 'challenges.uuid')
            ->orderBy('views', 'desc')
            ->take(5)->get();
        return json_encode(view('partials.home_stats')->with('challenges',$latest)->render());
    }

    public function mostParticipants(){
        $mostParticipants = DB::table('challenge_user')
            ->join('challenges', 'challenges.id', '=', 'challenge_id')->where('challenges.public', '=' , 1)
            ->select('challenge_id', 'challenges.title', 'challenges.category', 'challenges.uuid', DB::raw('count(*) as total'))
            ->groupBy('challenge_id')
            ->orderBy('total', 'desc')
            ->take(5)->get();

        return json_encode(view('partials.home_participants')->with('challenges',$mostParticipants)->render());
    }



    public function showChallenges($category = null)
    {

        $now = Carbon::now();
        $endedChallenges = DB::table('challenges')
            ->where(function ($query) {
                $now = Carbon::now();
                $query->where('closed', '=', 1)
                    ->orWhere('deadLine', '<', $now);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('category','like' , $category);
            })
            ->where('public', '=' , 1)
            ->orderBy('deadLine', 'desc')
            ->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ended', $page = null);



        $ongoingChallenges = DB::table('challenges')->where('closed', '=', 0)
            ->where('deadLine', '>' , $now)
            ->where('public', '=' , 1)
            ->when($category, function ($query) use ($category) {
                return $query->where('category','like' , $category);
            })
            ->orderBy('deadLine', 'asc')
            ->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);

//
        return view('challenges')->with('challenges', $ongoingChallenges)
            ->with('endedChallenges', $endedChallenges);


    }


    public function getOngoingChallenges(){

        $now = Carbon::now();
        $category = \Illuminate\Support\Facades\Input::get('category');
        $ongoingChallenges = Challenge::where('closed', '=', 0)
            ->when($category, function ($query) use ($category) {
                return $query->where('category','like' , $category);
            })
            ->where('deadLine', '>' , $now)
            ->where('public', '=' , 1)
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);


        return json_encode(view('partials.challenge')->with('challenges',$ongoingChallenges)->render());

    }

    public function getEndedChallenges(){

        $now = Carbon::now();
        $category = \Illuminate\Support\Facades\Input::get('category');
        $endedChallenges = Challenge::where(function ($query) {
            $now = Carbon::now();
            $query->where('closed', '=', 1)
                ->orWhere('deadLine', '<', $now);
        })
            ->when($category, function ($query) use ($category) {
                return $query->where('category','like' , $category);
            })
            ->where('public', '=' , 1)
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ended', $page = null);


        return json_encode(view('partials.challenge')->with('challenges',$endedChallenges)->render());

    }




    public function sendLinkToFacebook($link, $message){
        $fb = new Facebook\Facebook([
            'app_id' => '948239501878979',
            'app_secret' => 'c48d7b6ef2d379c1dc9218863a394d20',
            'default_graph_version' => 'v2.2',
        ]);

        $linkData = [
            'picture' => 'http://hiolegends.com/img/headerfb/Header02_470x246.jpg',
            'name' => 'HIO - Challenge',
            'description' => 'HIO é uma plataforma de criação de desafios entre amigos e comunidade!',
            'link' => $link,
            'message' => $message,

        ];

        try {
            $response = $fb->post('/me/feed', $linkData, Auth::user()->facebook_token);
            $graphNode = $response->getGraphNode();

            echo 'Posted with id: ' . $graphNode['id'];
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
//            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
//            exit;
        }


    }


    public function listFriends(){

        $user = Auth::user();
        $friends = $user->friends;
        $friends = json_decode($friends, true);
        if(!is_array($friends)){
            $friends = array();
        }

        return json_encode($friends);

    }




    public function teste(){

        $now = new DateTime();
        Challenge::where('closed', '=', 0)->chunk(100, function($ongoingChallenges) use ($now) {
            foreach ($ongoingChallenges as $challenge) {
                //
                $deadLine = new DateTime($challenge->deadLine);
                $isValid = $now < $deadLine;
                if(!$isValid){
                    echo 'id:' .  $challenge->id .'<br>';
                    //we end challenge
                    $challenge->closed = true;
                    $challenge->save();
                    //verificar se os utilizadores adicionaram proofs e ver achievement

                    $sonChallenges = DB::table('files')->where('files.challenge_id', $challenge->id)
                        ->select('files.user_id', DB::raw('count(*) as total'))
                        ->groupBy('files.user_id')
                        ->get();
                    foreach ($sonChallenges as $sonChallenge) {
                        if ($user = User::where('id', $sonChallenge->user_id)->first()) {
                            $achievements = $user->achievements;
                            if($achievements == NULL){
                                $achievements = array('totalCompleted' => 1);
                            }else{
                                $achievements = json_decode($achievements, true);
                                if (!array_key_exists('totalCompleted', $achievements)) {
                                    $achievements['totalCompleted'] = 1;
                                }else{
                                    $achievements['totalCompleted'] = $achievements['totalCompleted']+1;
                                }
                            }
                            $user->achievements = json_encode($achievements);
                            $user->save();
                        }
                    }

                }

            }
        });
    }


    public function sendFriendAction(){
        $friendId = \Illuminate\Support\Facades\Input::get('friendId');
        $action = \Illuminate\Support\Facades\Input::get('action');
        if($action == 0){
//            Auth::user()->befriend(User::find($friendId));
            $this->befriendWithId($friendId);
        }else if($action == 1){
            $this->acceptFriendRequest($friendId);
        }else if($action == 2){
            $this->declineFriendRequest($friendId);
        }else if($action == 3) {
            $this->block($friendId);
        }else if($action == 4){
                $this->unblockFriend($friendId);
        }else if($action == 5){
            $this->cancelFriendRequest($friendId);
        }else if($action == 6){
            $this->unfriend($friendId);
        }

        return back()->withInput();




//        return redirect()->action(
//            'UserController@userProfile', ['id' => $friendId]
//        );
//        return $this->userProfile($friendId,false);

    }

    public function getFriends()
    {


//        $friendRequests = Auth::user()->getFriendRequests($perPage = 20);
//        $friendRequests = Auth::user()->getPendingFriendships($perPage = 20);
        $sentFriendRequests = $this->getSentFriendRequests();
        $friendRequests = $this->getFriendRequests();
        $friends = $this->getAllFriends(Auth::user()->id);
        $blockedFriends = $this->getBlockedFriends();
        echo "lll".json_encode($friendRequests);
        return view('friendList')
            ->with('friendRequests', $friendRequests)
            ->with('sentFriendRequests', $sentFriendRequests)
            ->with('friends', $friends)
            ->with('blockedFriends', $blockedFriends);
    }


    public function searchFriend(Request $request){
        $q = $request->input('q');
        return json_encode($this->getAllFriends(Auth::user()->id, $q));
    }

    public function search(Request $request){
        $search = $request->input('q');





        $queryUsers = DB::table('users')->where('name', 'like', '%'.$search.'%')
            ->select(['name','id', 'photo as image', DB::raw('0 as type')]);

        $queryUsers = DB::table('challenges')->where('title', 'like', '%'.$search.'%')
            ->select(['title as name','uuid as id', 'category as image', DB::raw('1 as type')])
            ->union($queryUsers)
            ->get();

//        $queryUser = DB::table('users')
//            ->where('id', '=', Auth::user()->id)
//            ->select('name', 'id', 'photo')
//            ->union($queryUsers)
//            ->get();
//        $users = $queryUser;




//     DB::table('modules')->get(['url', DB::raw('1 as active')]);




        return json_encode($queryUsers);
    }


    public function sendEmail($challenge, $users, $total)
    {

        try {
            $date = $challenge->deadLine;
            $createDate = new DateTime($date);
            $deadline = $createDate->format('Y-m-d');
            $nameCreator = Auth::user()->name;
            foreach ($users as $user){
                Mail::send('mail.emailChallenge3', ['challenge' => $challenge, 'email' => $user->email,
                    'nameCreator' => $nameCreator,
                    'total' => $total, 'nameUser' => ' '.$user->name, 'deadline' => $deadline], function ($m) use ($total, $challenge, $nameCreator, $user, $deadline) {
                    $m->from('norelpy@hiolegends.com', 'HIO - Challenge');

                    $subject = "$nameCreator . ' challenged you! - ".$challenge->title;
                    if ($user->email === Auth::user()->email) {

                        if ($total > 1) {

                            $subject = "Are they better that you? Show them.";
                        }else{
                            $subject = "It's you vs you, will you win?";
                        }
                    }
                    $m->to($user->email, '')->subject($subject);
                });

            }
        } catch (\Exception $e) {
        }

    }

    public function sendEmailString($challenge, $emails, $total)
    {

        try {
            $date = $challenge->deadLine;
            $createDate = new DateTime($date);
            $deadline = $createDate->format('Y-m-d');
            $nameCreator = Auth::user()->name;
            foreach ($emails as $email){
                Mail::send('mail.emailChallenge3', ['challenge' => $challenge, 'email' => $email,
                    'nameCreator' => $nameCreator, 'total' => $total, 'nameUser' => '', 'deadline' => $deadline], function ($m) use ( $total, $challenge, $nameCreator, $email, $deadline) {
                    $m->from('norelpy@hiolegends.com', 'HIO - Challenge');

                    $m->to($email)->subject($nameCreator . ' challenged you! - '.$challenge->title);
                });

            }
        } catch (\Exception $e) {
        }

    }

    public function sendContactEmail($name, $email, $messageBody)
    {


//        $sendTo = "joaosampaio30@gmail.com";
        $sendTo = "hiominimalblog@gmail.com";
        //try {
        Mail::send('mail.emailContact', ['name' => $name, 'email' => $email, 'messageBody' => $messageBody], function ($m) use ($name, $sendTo, $email, $messageBody) {
            $m->from('norelpy@hiolegends.com', 'HIO - Contact');

            $m->to($sendTo, '')->subject($email . ' sent a contact request.');
        });
//        } catch (\Exception $e) {
//            echo $e;
//        }

    }


}
