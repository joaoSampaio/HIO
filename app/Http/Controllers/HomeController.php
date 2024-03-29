<?php namespace App\Http\Controllers;

use App;
use App\Model\CategoryLevel;
use App\Model\Challenge;
use App\Model\ChallengeCategory;
use App\Model\ChallengeLevelUp;
use App\Model\FileHio;
use App\Model\LikedChallengeNotification;
use App\Model\Notification;
use Carbon\Carbon;
use App\Model\NotificationManager;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Input;
use Intervention\Image\Facades\Image;
use Auth;
//use Mail;
use Storage;
use App\Model\ChallengeUserAssociation;
use App\Model\User;
use DateTime;
use Facebook;
use App\Http\Requests\FileFormRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use FFMpeg\Format\Video;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades;

use App\Http\Traits\FriendTrait;


class HomeController extends Controller
{

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

    private function getPageTotal()
    {
        return 5;
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
        if (Auth::user()) {
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

    public function storeContact(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        try {
            $this->sendContactEmail($name, $email, $message);
        } catch (\Exception $e) {

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




    public function fixPhotos()
    {
//        $files = File::allFiles('uploads/users/');
//        foreach ($files as $fileName)
//        {
//            if(!str_contains($fileName, 'default_user.png'))
//                $image = Image::make(sprintf('%s', $fileName))->fit(200)->save();
//            echo $fileName, "\n";
//        }

        $files = File::allFiles('img/categories_thumb/');
        foreach ($files as $fileName) {
            $image = Image::make(sprintf('%s', $fileName))->fit(200)->save();
//            $info = pathinfo($fileName);
//            echo $info["filename"], "<br>";
//            echo $info["extension"], "<br>";
//            echo json_encode($info), "<br>";
//
//            $image = Image::make(sprintf('%s', $fileName))->fit(200)->save($info["dirname"]."/".$info["filename"]."_thumb");
////            echo $fileName, "\n";
        }
    }

    public function createChallenge($userFB = null)
    {
        //$uuid = Uuid::uuid4();

//        $category = [
//            '' => 'Choose your Sport',
//            'Awesome Stuff' => 'Awesome Stuff',
//            'Basketball' => 'Basketball',
//            'Bodyboard' => 'Bodyboard',
//            'Boxe' => 'Boxe',
//            'Cycling' => 'Cycling',
//            'Fitness' => 'Fitness',
//            'Football' => 'Football',
//            'Golf' => 'Golf',
//            'Gym' => 'Gym',
//            'Gymnastics' => 'Gymnastics',
//            'Hockey' => 'Hockey',
//            'Jiu-Jitsu' => 'Jiu-Jitsu',
//            'Judo' => 'Judo',
//            'Karate' => 'Karate',
//            'Kickboxing' => 'Kickboxing',
//            'MMA' => 'MMA',
//            'Muay Thai' => 'Muay Thai',
//            'Rugby' => 'Rugby',
//            'Running' => 'Running',
//            'Snow Sports' => 'Snow Sports',
//            'Surf' => 'Surf',
//            'Swimming' => 'Swimming',
//            'Taekwondo' => 'Taekwondo',
//            'Tennis' => 'Tennis',
//            'Trail' => 'Trail',
//            'Volleyball' => 'Volleyball',
//
//        ];
        $categories = ChallengeCategory::where('visible', '=', 1)->where('active', '=', 1)->pluck('name','id');

        if ($userFB != null && $targetUser = User::where('id', $userFB)->first()) {
            return View('createChallenge')->with('category', $categories)->with('targetUser', $targetUser);
        } else {
            return View('createChallenge')->with('category', $categories);
        }


    }

    //no inicio apenas o criador faz parte do desafio, quando as outras pessoas registarem e aceitarem o desafio entao sao adicionadas
    public function storeChallenge(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'category' => 'required',
            'deadLine' => 'required',
            'title' => 'required',
        ]);

        $emailsToSend = array();
        $emailsToSendString = array();
        $emails = $request->input('emailFriend');
//        print_r($emails);
//        echo json_encode($emails);
        $challengeMyself = false;
        $total = 0;
        $notificationManager = new NotificationManager();
        if (is_array($emails) || is_object($emails)) {
            foreach ($emails as $email) {
                if (str_contains($email, '@')) {
                    //envio email
                    $total++;
                    array_push($emailsToSendString, $email);
                } else if (is_numeric($email)) {


                    if ($email == Auth::user()->id) {
                        $challengeMyself = true;
                    }else if ($hioUser = User::where('id', $email)->first()) {
                        $total++;
                        array_push($emailsToSend, $hioUser);
                    }
                }
            }
        }
//        print_r($emailsToSend);


        if (Auth::user()->role == "brand" && $request->input('sendall', false)) {
            foreach ($this->getAllFriends(Auth::user()->id) as $user) {
                $total++;
                array_push($emailsToSend, $user);
            }
        }


        $title = strip_tags($request->input('title'));
        $creator_id = Auth::user()->id;

        $description = strip_tags($request->input('description'));
        $category = $request->input('category');
        $reward = strip_tags($request->input('reward'));
        $penalty = strip_tags($request->input('penalty'));
        $deadLine = $request->input('deadLine');
        $public = $request->input('public', false);

        if ($public == "true") {
            $public = 1;
        } else {
            $public = 0;
        }
        $uuid = Uuid::uuid4();
        $secret = 0;

        $reference_id = $uuid;
        //se for privado
        if ($public === 0) {
            $secret = mt_rand(1000000, 9999999);
            $reference_id = $uuid.'/'.$secret;
        }

        $achievements = Auth::user()->achievements;
        if ($achievements == NULL) {
            $achievements = array('1create' => 1);
            Auth::user()->achievements = json_encode($achievements);
            Auth::user()->save();
        } else {
            $achievements = json_decode($achievements, true);
            if (!array_key_exists('1create', $achievements)) {
                $achievements['1create'] = 1;
                Auth::user()->achievements = json_encode($achievements);
                Auth::user()->save();
            }
        }

        $challenge = new Challenge(['title' => $title, 'creator_id' => $creator_id,
            'description' => $description, 'category_id' => $category, 'reward' => $reward, 'penalty' => $penalty,
            'deadLine' => $deadLine, 'uuid' => $uuid, 'public' => $public, 'secret' => $secret,]);
        if ($challengeMyself) {
            Auth::user()->challenges()->save($challenge);
        } else {
            $challenge->save();
        }


        $remindEmail = array();
        if (is_array($emails) || is_object($emails)) {
            $time = Carbon::now()->toDateTimeString();
            foreach ($emails as $userId) {

                $remindEmail[] = array(
                    'userIdOrEmail' => $userId,
                    'challenge_id' => $challenge->id,
                    'uuid' => $reference_id,
                    'created_at' => $time,
                    'updated_at' => $time
                );

                if (is_numeric($userId) && $userId != Auth::user()->id) {

                    $notification = new Notification(['recipient_id' => $userId, 'sender_id' => Auth::user()->id, 'unread' => 1,
                        'type' => App\Model\Notification::TYPE_INVITE_CHALLENGE, 'parameters' => $challenge->title, 'reference_id' => $reference_id]);
                    $notificationManager->add($notification);
                }
            }
        }

        //send post to facebook
        $post_facebook = $request->input('post_facebook', false);
        if ($post_facebook) {
            $link = action('HomeController@challengeDetail', [$uuid]);
            $this->sendLinkToFacebook($link, $description);
        }

        DB::table('mail_reminds')->insert($remindEmail);

        if (!App::environment('local')) {

            $this->sendEmail($challenge, $emailsToSend, $total);
            $this->sendEmailString($challenge, $emailsToSendString, $total);
        }
//        echo "...".json_encode($emailsToSend);
        \Session::flash('challengeCreated', 'true');
//return "";
        return View('partials.create_result')->with('challengeId', $uuid);
//        return redirect()->action('UserProfileController@userProfile', 'me')->with(['challengeCreated' => 'true']);
    }

    public function joinChallenge($uuid)
    {
        $success = false;
        $message = " ";
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            //nao permitir aceitar duas vezes
            if (!ChallengeUserAssociation::where('challenge_id', $challenge->id)->where('user_id', Auth::user()->id)->first()) {


                Auth::user()->challenges()->save($challenge);
                $success = true;


//            $countVotes = $this->getVoteCount($challenge);


                $creator = $challenge->users()->where('user_id', $challenge->creator_id)->value('name');
                $creator = '<a href="/profile/' . $challenge->creator_id . '">' . $creator . '</a>';
                $peopleParticipating = $challenge->users()->select('name', 'user_id')->get();

                $end = $creator . '<span> is challenging </span>';
                $count = 0;


                $otherPeople = "";
                //$array = array_except($array, ['price']);
                foreach ($peopleParticipating as $people) {
                    if ($people->user_id == $challenge->creator_id) {
                        continue;
                    }
                    $count++;
                    if ($count > 2) {
                        $otherPeople = $otherPeople . ' <a href="/profile/' . $people->user_id . '"> ' . $people->name . '</a>,';
                    } else {
                        $end = $end . '<a href="/profile/' . $people->user_id . '"> ' . $people->name . '</a>,';
                    }
                }
                $end = rtrim($end, ",");

                if (count($peopleParticipating) > 3) {
                    $otherPeople = rtrim($otherPeople, ",");
                    $end = $end . '  <span>and</span> <span id="showmore" class="label label-info"> ' . (count($peopleParticipating) - 3) .
                        ' other people.</span> <span id="otherpeople" style="display: none;">' . $otherPeople . '</span>';

                }

                $message = $end;
            }

        }
        $arr = array('status' => $success, 'message' => $message);

        return json_encode($arr);

    }

//    public function voteChallenge($uuid)
//    {
//        //preciso de table de votes para que nao seja possivel votar varias vezes
//
//        $success = false;
//        $error = "";
//        $count = 0;
//        if ($challenge = Challenge::where('uuid', $uuid)->first()) {
//
//            //se nao tiver votado
//            if(!$this->getVote($challenge)){
//                $vote = new Vote(['user_id' => Auth::user()->id,]);
//                $challenge->votes()->save($vote);
//                $success = true;
//                $count = $challenge->votes()->count();
//            }
//        }
//        $arr = array('status' => $success, 'count' => $count);
//
//        return json_encode($arr);
//
//    }

//    public function getVote($challenge) {
//        $vote = $challenge->votes()->where('user_id', Auth::user()->id)->first();
//        return ($vote) ? $vote : false;
//    }
//
//    public function getVoteCount($challenge) {
//        $vote = $challenge->votes()->count();
//        return $vote;
//    }

    private function isUserInChallenge($challenge)
    {
        $user = $challenge->users()->where('user_id', Auth::user()->id)->first();
        return ($user) ? true : false;
    }


    public function challengeDetail($uuid, $secret = null)
    {
        Log::info("--------------------$uuid--" );
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            $now = new DateTime();
            $deadLine = new DateTime($challenge->deadLine);
            $isValid = !$challenge->isClosed();

            $isPublic = false;
            if ($challenge->public == 0) {
                if ($secret != null && $challenge->secret == $secret || (Auth::check() && $challenge->creator_id == Auth::user()->id)) {
                    $isPublic = true;
                }
            } else {
                $isPublic = true;
            }

            $participating = false;
            if (Auth::check()) {
                $participating = $this->isUserInChallenge($challenge);
            }

            $creatorUser = User::where('id', $challenge->creator_id)->first();
            $creator = $creatorUser->name;
            $peopleParticipating = $challenge->users()->select('name', 'user_id')->get();


            $creator = '<a class="participating-link-text" href="/profile/'.$challenge->creator_id.'">'.$creator . '</a>';

            $end = $creator . '<span> is challenging </span>';
            $count = 0;
            $otherPeople = "";
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
                $end = $end . '  <span>and</span> <span id="showmore" class=""> ' . (count($peopleParticipating) - 3) .
                    ' other people.</span> <span id="otherpeople" style="display: none;">' . $otherPeople . '</span>';

            }
            if(count($peopleParticipating) == 1){
                $end = $creator.' is publically challenging everyone, accept his challenge and prove you are ahead';
            }
            if(count($peopleParticipating) <= 0){
                $end = 'Be the first to accept this challenge and prove you are ahead.';
            }

            if($challenge->challenge_lvl_up_id != 0){
                $end = '<a class="participating-link-text" href="/profile/'.$challenge->creator_id.'">'.$creator . '</a> is leveling up at ' . $challenge->category->name;
            }

            $sonChallenges = $this->getHelperPaginatorSon($challenge->id, $participating, $isValid);

            if ($isPublic == 1 || $participating) {
                return view('challengeDetail')->with('challenge', $challenge)->with('isValid', $isValid)
                    ->with('participating', $participating)
                    ->with('creator', $creator)->with('peopleParticipating', $peopleParticipating)
                    ->with('sonChallenges', $sonChallenges)->with('people', $end)->with('showDelete', true);
            } else {

                return view('challengeDetail')->with('isPublic', $isPublic);
            }

        } else {
            abort(404);
            return view('challengeDetail')->with('error', $uuid);
        }
    }

    private function getHelperPaginatorSon($id, $participating, $isValid)
    {
        $initialQuantity = 5;
        $loadMore = 6;

        if ((!$participating && $isValid) || !$isValid) {
            $initialQuantity = 6;
        }

        $page = (int)Paginator::resolveCurrentPage();
        $perPage = ($page == 1) ? $initialQuantity : $loadMore;
        $skip = ($page == 1) ? 0 : ($initialQuantity + ($loadMore * ($page - 2)));
        // Get a full collection to be able to calculate the full total all the time
        $total = DB::table('files')->where('challenge_id', $id)
            ->join('users', 'files.user_id', '=', 'users.id')
            ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
            ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid')->count();
        // Get the correct results


        if (Auth::check()) {
            //ordenar pelos proprios

            $myModelResults = DB::table('files')->where('challenge_id', $id)->where('user_id', Auth::user()->id)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
                ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid')->get();

            $othersModelResults = DB::table('files')->where('challenge_id', $id)->where('user_id', '!=', Auth::user()->id)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
                ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid')->get();

            $modelResults = array_merge($myModelResults, $othersModelResults);
            $modelResults = array_slice($modelResults, $skip, $perPage);

        } else {
            $modelResults = DB::table('files')->where('challenge_id', $id)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->join('challenges', 'files.challenge_id', '=', 'challenges.id')
                ->select('users.name', 'files.*', 'challenges.title', 'challenges.uuid')->skip($skip)->take($perPage)->get();
        }


        $total = $total + 1;
        if ($participating && $isValid && $page == 1) {
            $copia = new \stdClass;
            $copia->id = -1;
//            array_push($modelResults, $copia);
            array_unshift($modelResults, $copia);

        }
        $perPage = 6;
//        echo json_encode($modelResults);

        return new LengthAwarePaginator($modelResults, $total, $perPage);
    }

    public function getSonChallenges($id)
    {

        $participating = false;

        if (Auth::check()) {
            if ($challenge = ChallengeUserAssociation::where('challenge_id', $id)->where('user_id', Auth::user()->id)->first()) {
                $participating = true;
            }
        }

        $challenge = Challenge::findOrFail($id);
        $isValid = !$challenge->isClosed();

        return json_encode(view('partials.multi_son_challenge')
            ->with('participating', $participating)
            ->with('isValid', $isValid)
            ->with('showDelete', true)
            ->with('sonChallenges', $this->getHelperPaginatorSon($id, $participating, $isValid))->render());

    }

    public function closeChallenge($uuid)
    {
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            $now = new DateTime();
            $deadLine = new DateTime($challenge->deadLine);
            $isValid = $now < $deadLine;
            if ($isValid && Auth::check() && Auth::user()->id == $challenge->creator_id) {
                $challenge->deadLine = $now;
                $challenge->closed = true;
                $challenge->save();
            }
        }
        return redirect()->action('HomeController@challengeDetail', $uuid);
    }

    public function editChallenge($uuid)
    {
        $error = '';
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {
            $now = new DateTime();
            $deadLine = new DateTime($challenge->deadLine);
            $isValid = $now < $deadLine;

            if ($challenge->creator_id != Auth::user()->id) {
                $error = 'Not authorized';
            } elseif ($challenge->closed) {
                $error = 'Challenge is closed!';
            } elseif (!$isValid) {
                $error = 'Time is over!';
            } else {
                return view('editChallenge')->with('challenge', $challenge);
            }
        } else {
            $error = 'Challenge not found!';
        }
        return view('editChallenge')->with('error', $error);
    }

    public function editStoreChallenge($uuid, Request $request)
    {
        $error = '';
        if ($challenge = Challenge::where('uuid', $uuid)->first()) {

            if ($challenge->creator_id != Auth::user()->id) {
                $error = 'Not authorized';
            } elseif ($challenge->closed) {
                $error = 'Challenge is closed!';
            } else {
//                $challenge->deadLine = $request->input('deadLine');
                $challenge->description = $request->input('description');
                $challenge->save();
                return redirect()->action('HomeController@challengeDetail', $uuid);
            }
        } else {
            $error = 'Challenge not found!';
        }
        return view('editChallenge')->with('error', $error);
    }


    public function latestChallenges()
    {

//        $latest = Cache::remember('latest-home', 15, function() {
            $now = Carbon::now();
            $latest =  Challenge::where('closed', '=', 0)
                ->join('challenge_category', 'challenge_category.id', '=', 'challenges.category_id')
                ->where('deadLine', '>', $now)
                ->where('public', '=', 1)
                ->select('challenges.*')
                ->orderBy('deadLine', 'asc')
                ->take(6)->get();
//        });


        return json_encode(view('partials.multi_challenge')->with('challenges', $latest)->render());
    }


    public function mostViewed()
    {

        $latest = Cache::remember('most-viewed-home', 15, function() {
            return DB::table('files')
                ->join('challenges', 'challenges.id', '=', 'files.challenge_id')->where('challenges.public', '=', 1)
                ->join('users', 'files.user_id', '=', 'users.id')
                ->select('users.name', 'users.id', 'files.id', 'users.photo', 'files.*', 'challenges.title', 'challenges.uuid')
                ->orderBy('views', 'desc')
                ->take(3)->get();
        });
        return json_encode(view('partials.home_stats')->with('challenges', $latest)->render());
    }

    public function mostParticipants()
    {
        $mostParticipants = DB::table('challenge_user')
            ->join('challenges', 'challenges.id', '=', 'challenge_id')->where('challenges.public', '=', 1)
            ->join('users', 'challenge_user.user_id', '=', 'users.id')
            ->join('challenge_category', 'challenge_category.id', '=', 'challenges.category_id')
            ->select('challenge_id', 'challenges.title', 'challenge_category.name as category', 'challenges.uuid', 'challenges.id AS user_id', 'users.name', DB::raw('count(*) as total'))
            ->groupBy('challenge_id')
            ->orderBy('total', 'desc')
            ->take(3)->get();

        $categories = ChallengeCategory::where('visible', '=', 1)->where('active', '=', 1)->pluck('name','id');

        return json_encode(view('partials.home_participants')->with('challenges', $mostParticipants)->render());
    }


    public function showChallenges($category = null)
    {

        $endedChallenges = $this->getEndedChallengesHelper($category);
        $ongoingChallenges = $this->getOngoingChallengesHelper($category);
        $allChallenges = $this->getAllChallengesHelper($category);
        $allProofs = $this->getAllProofsHelper();
        $ongoingProofs = $this->getOngoingProofsHelper();
        $endedProofs = $this->getEndedProofsHelper();

        return view('challenges')
            ->with('challenges', $ongoingChallenges)
            ->with('endedChallenges', $endedChallenges)
            ->with('allChallenges', $allChallenges)
            ->with('allProofs', $allProofs)
            ->with('ongoingProofs', $ongoingProofs)
            ->with('endedProofs', $endedProofs);
    }

    protected function getOngoingChallengesHelper($cat = null){
        if($cat != null)
            $category = $cat;
        else
            $category = \Illuminate\Support\Facades\Input::get('category');
        $now = Carbon::now();
        $ongoingChallenges = Challenge::where('closed', '=', 0)
            ->when($category, function ($query) use ($category) {
                return $query->where('category', 'like', $category);
            })
            ->where('deadLine', '>', $now)
            ->where('public', '=', 1)
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);
        return $ongoingChallenges;
    }

    protected function getEndedChallengesHelper($cat = null)
    {
        if($cat != null)
            $category = $cat;
        else
            $category = \Illuminate\Support\Facades\Input::get('category');
        $now = Carbon::now();
        $endedChallenges = Challenge::where(function ($query) use ($now) {
            $query->where('closed', '=', 1)
                ->orWhere('deadLine', '<', $now);
        })
            ->when($category, function ($query) use ($category) {
                return $query->where('category', 'like', $category);
            })
            ->where('public', '=', 1)
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ended', $page = null);

        return $endedChallenges;

    }

    protected function getAllChallengesHelper($cat = null)
    {
        if($cat != null)
            $category = $cat;
        else
            $category = \Illuminate\Support\Facades\Input::get('category');
        $allChallenges = Challenge::where('public', '=', 1)
            ->when($category, function ($query) use ($category) {
                return $query->where('category', 'like', $category);
            })
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'all', $page = null);
        return $allChallenges;
    }

    public function getOngoingChallenges()
    {
        $ongoingChallenges = $this->getOngoingChallengesHelper();
        return json_encode(view('partials.challenge')->with('challenges', $ongoingChallenges)->render());

    }

    public function getEndedChallenges()
    {
        $endedChallenges = $this->getEndedChallengesHelper();
        return json_encode(view('partials.challenge')->with('challenges', $endedChallenges)->render());
    }

    public function getAllChallenges()
    {
        $allChallenges = $this->getAllChallengesHelper();
        return json_encode(view('partials.challenge')->with('challenges', $allChallenges)->render());

    }


    protected function getAllProofsHelper(){
        $proofs = DB::table('files')
            ->where('is_ready','=', 1)
            ->where('challenges.public', '=', 1)
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
            ->join('users', 'files.user_id', '=', 'users.id')
//            ->leftJoin('proof_approval as proofs_total', 'proofs_total.proof_id','=', 'files.id')
            ->select('files.*','users.name','challenges.uuid','challenges.title',
                'challenges.judged')

            ->orderBy('files.created_at', 'desc')
            ->paginate($perPage = 6, $columns = ['*'], $pageName = 'all', $page = null);
        return $proofs;
    }

    public function getAllProofs()
    {
        $allProofs = $this->getAllProofsHelper();
        return json_encode(view('partials.proofs')->with('proofs', $allProofs)->render());
    }

    protected function getOngoingProofsHelper(){
        $proofs = DB::table('files')
            ->where('is_ready','=', 1)
            ->where('challenges.public', '=', 1)
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->where('challenges.judged','=', 0)
//            ->leftJoin('proof_approval as proofs_total', 'proofs_total.proof_id','=', 'files.id')
            ->select('files.*','users.name','challenges.uuid','challenges.title',
                'challenges.judged')

            ->orderBy('files.created_at', 'desc')
            ->paginate($perPage = 6, $columns = ['*'], $pageName = 'ongoing', $page = null);
        return $proofs;
    }

    public function getOngoingProofs()
    {
        $ongoingProofs = $this->getOngoingProofsHelper();
        return json_encode(view('partials.proofs')->with('proofs', $ongoingProofs)->render());
    }

    protected function getEndedProofsHelper(){
        $proofs = DB::table('files')
            ->where('is_ready','=', 1)
            ->where('challenges.public', '=', 1)
            ->join('challenges', 'challenges.id', '=', 'files.challenge_id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->where('challenges.judged','=', 1)
//            ->leftJoin('proof_approval as proofs_total', 'proofs_total.proof_id','=', 'files.id')
            ->select('files.*','users.name','challenges.uuid','challenges.title',
                'challenges.judged')

            ->orderBy('files.created_at', 'desc')
            ->paginate($perPage = 6, $columns = ['*'], $pageName = 'ended', $page = null);
        return $proofs;
    }

    public function getEndedProofs()
    {
        $endedProofs = $this->getEndedProofsHelper();
        return json_encode(view('partials.proofs')->with('proofs', $endedProofs)->render());
    }


    public function sendLinkToFacebook($link, $message)
    {
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
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
//            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
//            exit;
        }


    }


    public function listFriends()
    {

        $user = Auth::user();
        $friends = $user->friends;
        $friends = json_decode($friends, true);
        if (!is_array($friends)) {
            $friends = array();
        }

        return json_encode($friends);

    }


    public function teste()
    {
        try {
            $now = new DateTime();
            Log::info('end_approve_challenge called nova versao - 04/06/2017');



            $challengesIds = array();
            Challenge::where('judged', '=', 0)->chunk(100, function ($challenges) use ($now, &$challengesIds) {
                foreach ($challenges as $challenge) {

                    $idsUserCompletedChallenge = [];
                    $deadLine = Carbon::parse($challenge->deadLine);
                    $deadLine = $deadLine->addHours(36);
                    $isValid = $now < $deadLine;
                    if (!$isValid) {

                        echo "aaa".$challenge->id;
                        //validar provas e judgments


                        $sonChallengesIds = DB::table('files')->where('files.challenge_id', $challenge->id)
                            ->join('proof_approval', 'proof_approval.proof_id', '=', 'files.id')
                            ->where('proof_approval.judgment', '=', '1')
                            ->groupBy('files.id')
                            ->leftJoin(
                                DB::raw("
                                (select
                                    `proof_approval`.`proof_id`,
                                    COUNT(*) as total_judgment
                                from `proof_approval`
                                group by `proof_approval`.`proof_id`) `p`
                            "), 'files.id', '=', 'p.proof_id')
                            ->select('files.id', 'total_judgment',
                                DB::raw('COUNT(proof_approval.judgment) as positive_judgment'),
                                DB::raw('COUNT(proof_approval.judgment)/total_judgment as percent')
                            )
                            ->havingRaw('percent >= 0.7')
                            ->lists('files.id');


                        $failedProofs = DB::table('files')->where('files.challenge_id', $challenge->id)->whereNotIn('id', $sonChallengesIds)->lists('files.id');

                        //proof can have no votes
                        if(count($failedProofs) == 0){

                        }

                        FileHio::whereIn('id', $sonChallengesIds)
                            ->update([
                                'approved' => true
                            ]);


                        //se a prova pertence a um desafio de lvl up, entao vai actualizar os inprogress e os completed
                        FileHio::whereIn('id', $sonChallengesIds)->chunk(100, function ($files) {
                            foreach ($files as $file) {

                                DB::table('challenges')->where('challenges.id', '=', $file->challenge_id)->where('challenges.challenge_lvl_up_id', '!=', '0')
                                    ->join('challenge_levelup', 'challenges.challenge_lvl_up_id', '=', 'challenge_levelup.id')
                                    ->join('category_level', function($join) use ($file)
                                    {
                                        $join->on('category_level.user_id', '=',  DB::raw("'".$file->user_id."'"));
                                        $join->on('category_level.category_id','=', 'challenge_levelup.category_id');
                                    })->chunk(100, function($data) {
                                        // Process the records...
                                        echo "data:".json_encode($data);
                                        //[{"id":1,"uuid":"ee5249c7-58fd-4cc1-bcc0-de70edecf609",
//                                        "title":"Leg press 40kg","public":1,"description":"Leg press 40kg 3 reps",
//                                        "reward":"","penalty":"","deadLine":"2017-05-18 14:47:18",
//                                        "created_at":"2017-05-20 12:47:32","updated_at":"2017-05-20 12:47:32","closed":1,"creator_id":2,
//                                        "judged":0,"reminded":0,"rank":0,"secret":0,"category_id":1,"challenge_lvl_up_id":1,
//                                        "sub_title":"3 reps","level":0,"difficulty":0,"group_challenge":0,"user_id":2,
//                                        "deadLineLvl":"2017-05-27 12:47:32","inProgress":"0","completedGroups":""}]
                                        foreach ($data as $db) {

                                            //'category_id','user_id',  'level', 'deadLineLvl', 'inProgress', 'completedGroups'
                                            $catLevel = CategoryLevel::where('category_id', '=', $db->category_id)
                                                ->where('user_id', '=', $db->user_id)->first();
                                            $catLevel->addCompleted($db->group_challenge);
                                            $catLevel->save();


                                            //'title','sub_title', 'category_id', 'level', 'difficulty', 'group_challenge'
                                            $groups = ChallengeLevelUp::where('category_id', '=', $db->category_id)
                                                ->where('level', '=', $db->level)->groupBy('group_challenge')->get();

                                            Log::info('getCountCompleted:'.$catLevel->getCountCompleted());
                                            Log::info('ChallengeLevelUp total groups count:'.count($groups));
                                            echo "<br>getCountCompleted:".$catLevel->getCountCompleted();
                                            echo "<br>count".count($groups);
                                            if($catLevel->getCountCompleted() == count($groups)){
                                                $catLevel->level = $catLevel->level+1;
                                                $catLevel->inProgress = "";
                                                $catLevel->completedGroups = "";
                                                $catLevel->failedGroups = "";
                                                $catLevel->deadLineLvl = null;
                                                $catLevel->save();
                                            }
                                        }
                                    });
                            }
                        });

                        array_push($challengesIds, $challenge->id);





                        //
                        //Check failed proofs after successful files
                        //check if challenge is level up and has any proofs
                        $numProofs = DB::table('files')->where('files.challenge_id', $challenge->id)->count();
                        echo "<br>numProofs->".$numProofs;
                        if($numProofs == 0){
                            $catLevel = CategoryLevel::where('category_id', '=', $challenge->category_id)
                                ->where('user_id', '=', $challenge->creator_id)->first();

                            //get the ChallengeLevelUp by the id stored in the challenge
                            if($challengeLevelUp = ChallengeLevelUp::find($challenge->challenge_lvl_up_id)){
                                $catLevel->addFailed($challengeLevelUp->group_challenge);
                                $catLevel->save();
                            }
                        }
                        echo "<br>qwe";
                        echo "<br>".json_encode($failedProofs);
                        echo "<br>count failed->".count($failedProofs);
                        //failed proofs
                        FileHio::whereIn('id', $failedProofs)->chunk(100, function ($files) {
                            foreach ($files as $file) {
                                echo "<br>inside";
                                DB::table('challenges')->where('challenges.id', '=', $file->challenge_id)->where('challenges.challenge_lvl_up_id', '!=', '0')
                                    ->join('challenge_levelup', 'challenges.challenge_lvl_up_id', '=', 'challenge_levelup.id')
                                    ->join('category_level', function($join) use ($file)
                                    {
                                        $join->on('category_level.user_id', '=',  DB::raw("'".$file->user_id."'"));
                                        $join->on('category_level.category_id','=', 'challenge_levelup.category_id');
                                    })->chunk(100, function($data) {

                                        foreach ($data as $db) {
                                            $catLevel = CategoryLevel::where('category_id', '=', $db->category_id)
                                                ->where('user_id', '=', $db->user_id)->first();
                                            $catLevel->addFailed($db->group_challenge);
                                            $catLevel->save();
                                        }
                                    });
                            }
                        });








                        $users = DB::table('users')
                            ->whereIn('id', function ($query) use ($sonChallengesIds) {
                                $query->from('files')
                                    ->whereIn('id', $sonChallengesIds)
                                    ->select('files.user_id')
                                    ->groupBy('files.user_id');
                            })
                            ->get();

                        foreach ($users as $usertmp) {
                            $user = User::find($usertmp->id);
                            $achievements = $user->achievements;
                            if ($achievements == NULL) {
                                $achievements = array('totalCompleted' => 1);
                            } else {
                                $achievements = json_decode($achievements, true);
                                if (!array_key_exists('totalCompleted', $achievements)) {
                                    $achievements['totalCompleted'] = 1;
                                } else {
                                    $achievements['totalCompleted'] = $achievements['totalCompleted'] + 1;
                                }
                            }
                            $user->achievements = json_encode($achievements);
                            $user->xp = $user->xp + 100;
                            $user->save();

                            $notificationManager = new NotificationManager();
                            $notification = new LikedChallengeNotification(['recipient_id' => $user->id, 'sender_id' => $user->id, 'unread' => 1,
                                'type' => Notification::TYPE_XP, 'parameters' => $challenge->title, 'reference_id' => $challenge->uuid]);
                            $notificationManager->add($notification);

                        }
                    }
                }
            });
            echo "challengesIds:".json_encode($challengesIds);
            Challenge::whereIn('id', $challengesIds)
                ->update([
                    'judged' => true
                ]);


            Challenge::where('closed', '=', 0)->chunk(100, function ($ongoingChallenges) use ($now) {
                foreach ($ongoingChallenges as $challenge) {
                    //
                    $deadLine = new DateTime($challenge->deadLine);
                    $isValid = $now < $deadLine;

                    if (!$isValid) {
                        //we end challenge
                        $challenge->closed = true;
                        $challenge->save();
                    }
                }
            });

        }catch (\Exception $ex){
            Log::info('Exception catch');
            Log::info('Exception '. $ex->getMessage());
        }
        return "ok";
    }


    public function sendFriendAction()
    {
        $friendId = \Illuminate\Support\Facades\Input::get('friendId');
        $action = \Illuminate\Support\Facades\Input::get('action');
        if ($action == 0) {
//            Auth::user()->befriend(User::find($friendId));
            $this->befriendWithId($friendId);

            $notificationManager = new NotificationManager();
            //'recipient_id', 'sender_id', 'unread', 'type', 'parameters', 'reference_id',
            $notification = new LikedChallengeNotification(['recipient_id' => $friendId, 'sender_id' => Auth::user()->id, 'unread' => 1,
                'type' => App\Model\Notification::TYPE_RELATIONSHIP_INVITE, 'parameters' => "", 'reference_id' => 0]);
            $notificationManager->add($notification);

        } else if ($action == 1) {
            $this->acceptFriendRequest($friendId);
        } else if ($action == 2) {
            $this->declineFriendRequest($friendId);
        } else if ($action == 3) {
            $this->block($friendId);
        } else if ($action == 4) {
            $this->unblockFriend($friendId);
        } else if ($action == 5) {
            $this->cancelFriendRequest($friendId);
        } else if ($action == 6) {
            $this->unfriend($friendId);
        }

        return back()->withInput(\Illuminate\Support\Facades\Input::all());
    }


    public function getFriendsUser($id, $name)
    {

        $friends = $this->getAllFriends($id, NULL, 10);
        return view('friendsUser')
            ->with('friends', $friends)->with('name', $name);
    }

    public function getFriends()
    {


        $sentFriendRequests = $this->getSentFriendRequests(10);
        $friendRequests = $this->getFriendRequests(10);
        $friends = $this->getAllFriends(Auth::user()->id, NULL, 10);
        $blockedFriends = $this->getBlockedFriends(10);

        return view('friendList')
            ->with('friendRequests', $friendRequests)
            ->with('sentFriendRequests', $sentFriendRequests)
            ->with('friends', $friends)
            ->with('blockedFriends', $blockedFriends);
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('q');

        $search = strtolower($search);
        if (($search == "me" || str_contains(strtolower(Auth::user()->name), $search)) && Auth::check()) {
            $queryUsers = DB::table('users')
                ->where('name', 'like', '%' . $search . '%')
                ->where('role', '!=', 'trainer')
                ->select('name', 'id', 'photo');

            $queryUser = DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->select('name', 'id', 'photo')
                ->union($queryUsers)
                ->get();
            $users = $queryUser;
        } else {
            $users = DB::table('users')
                ->where('name', 'like', '%' . $search . '%')
                ->where('role', '!=', 'trainer')
                ->select('name', 'id', 'photo')
                ->get();
        }
        return json_encode($users);
    }

    public function searchFriend(Request $request)
    {
        $q = $request->input('q');
        return json_encode($this->getAllFriends(Auth::user()->id, $q));
    }

    public function search(Request $request)
    {
        $search = $request->input('q');


//        $category = [
//            'Awesome Stuff' => 'Awesome Stuff',
//            'Basketball' => 'Basketball',
//            'Bodyboard' => 'Bodyboard',
//            'Boxe' => 'Boxe',
//            'Cycling' => 'Cycling',
//            'Fitness' => 'Fitness',
//            'Football' => 'Football',
//            'Golf' => 'Golf',
//            'Gym' => 'Gym',
//            'Gymnastics' => 'Gymnastics',
//            'Hockey' => 'Hockey',
//            'Jiu-Jitsu' => 'Jiu-Jitsu',
//            'Judo' => 'Judo',
//            'Karate' => 'Karate',
//            'Kickboxing' => 'Kickboxing',
//            'MMA' => 'MMA',
//            'Muay Thai' => 'Muay Thai',
//            'Rugby' => 'Rugby',
//            'Running' => 'Running',
//            'Snow Sports' => 'Snow Sports',
//            'Surf' => 'Surf',
//            'Swimming' => 'Swimming',
//            'Taekwondo' => 'Taekwondo',
//            'Tennis' => 'Tennis',
//            'Trail' => 'Trail',
//            'Volleyball' => 'Volleyball',
//        ];


        $queryUsers = DB::table('users')->where('name', 'like', '%' . $search . '%')
            ->select(['name','role', 'id', 'photo as image', DB::raw('0 as type')]);

        $queryCat = DB::table('challenge_category')->where('name', 'like', '%' . $search . '%')
            ->select(['name', DB::raw('0 as role'), 'name as id', 'photo as image',  DB::raw('2 as type')]);

        $queryUsers = DB::table('challenges')->where('title', 'like', '%' . $search . '%')->where('public','=','1')
            ->join('challenge_category', 'challenge_category.id', '=', 'challenges.category_id')
            ->select(['title as name', DB::raw('0 as role'), 'uuid as id', 'challenge_category.photo as image', DB::raw('1 as type')])
            ->union($queryUsers)
            ->union($queryCat)
            ->get();


//        $search = strtolower($search);
//        foreach ($category as $url) {
//            if (str_contains(strtolower($url), $search)) { // Yoshi version
//                $temp = [
//                    'name' => $url,
//                    'id' => $url,
//                    'image' => $url,
//                    'type' => '2',
//                ];
//                array_push($queryUsers, $temp);
//
//            }
//        }
        return json_encode($queryUsers);
    }

    public function getChallengeSonViews($fileId)
    {
        $sonChallenges = DB::table('files_views')->where('files_views.file_id', $fileId)
            ->join('users', 'files_views.user_id', '=', 'users.id')
            ->select('users.name', 'users.photo', 'users.id as userId')
            ->get();
        return json_encode($sonChallenges);
    }


    public function getChallengeParticipants($challengeId)
    {
        $users = DB::table('challenge_user')->where('challenge_user.challenge_id', $challengeId)
            ->join('users', 'challenge_user.user_id', '=', 'users.id')
            ->select('users.name', 'users.photo', 'users.id as userId')
            ->get();

        return json_encode($users);
    }


    public function getProfileImage($id)
    {


        if ($user = User::where('id', $id)->first()) {
            if ($user->photo != "") {

                return response()->file(base_path() . '/public/uploads/users/' . $user->photo);
            }
        }

        return response()->file(base_path() . '/public/uploads/users/default_user.png');
    }


//    public function dummyNotification(){
//
//
//        $notificationManager = new NotificationManager;
//        //'recipient_id', 'sender_id', 'unread', 'type', 'parameters', 'reference_id',
//        $notification = new RelationshipInviteNotification(['recipient_id' => Auth::user()->id, 'sender_id' => $creator_id, 'unread' => 1,
//            'type' => App\Model\Notification::TYPE_RELATIONSHIP_INVITE, 'parameters' => "", 'reference_id' => 0]);
//    }


    public function addCommentCallback(Request $request)
    {
        $proofId = $request->input('proofId');
        $text = $request->input('text');
        if (Auth::check()) {

            if ($fileHio = FileHio::where('id', $proofId)->first()) {

                if ($fileHio->user_id != Auth::user()->id) {
                    $notificationManager = new NotificationManager();
                    $notification = new LikedChallengeNotification(['recipient_id' => $fileHio->user_id, 'sender_id' => Auth::user()->id, 'unread' => 1,
                        'type' => App\Model\Notification::TYPE_COMMENT_CHALLENGE, 'parameters' => $text, 'reference_id' => $proofId]);
                    $notificationManager->add($notification);
                }
            }
        }
        return "deu";
    }


    public function sendEmail($challenge, $users, $total)
    {

        try {
            $date = $challenge->deadLine;
            $createDate = new DateTime($date);
            $deadline = $createDate->format('Y-m-d');
            $nameCreator = Auth::user()->name;

            $array = $challenge->toArray();
            foreach ($users as $user) {
                //Mail::queueOn('emails',
                Mail::queueOn('emails', 'mail.emailChallenge', ['array' => $array, 'email' => $user->email,
                    'nameCreator' => $nameCreator,
                    'total' => $total, 'nameUser' => ' ' . $user->name, 'deadline' => $deadline], function ($m) use ($total, $array, $nameCreator, $user, $deadline) {
                    $m->from('hio@hiolegends.com', 'HIO - Challenge');

                    $subject = "$nameCreator challenged you! - " . $array['title'];

                    $m->to($user->email, '')->subject($subject);
                });

            }
        } catch (\Exception $e) {
            Log::info('Exception catch');
            Log::info('Exception '. $e->getMessage());
        }

    }

    public function sendEmailString($challenge, $emails, $total)
    {
        try {
            $date = $challenge->deadLine;
            $createDate = new DateTime($date);
            $deadline = $createDate->format('Y-m-d');
            $nameCreator = Auth::user()->name;
            $array = $challenge->toArray();

            foreach ($emails as $email) {
                Mail::queueOn('emails', 'mail.emailChallenge', ['array' => $array, 'email' => $email,
                    'nameCreator' => $nameCreator, 'total' => $total, 'nameUser' => '', 'deadline' => $deadline],
                    function ($m) use ($total, $array, $nameCreator, $email, $deadline) {
                    $m->from('hio@hiolegends.com', 'HIO - Challenge');

                    $m->to($email)->subject("$nameCreator challenged you! - " . $array['title']);
                });

            }
        } catch (\Exception $e) {
            Log::info('Exception catch');
            Log::info('Exception '. $e->getMessage());
        }

    }

    public function sendContactEmail($name, $email, $messageBody)
    {


//        $sendTo = "joaosampaio30@gmail.com";
        $sendTo = "hiominimalblog@gmail.com";
        //try {
        Mail::send('mail.emailContact', ['name' => $name, 'email' => $email, 'messageBody' => $messageBody], function ($m) use ($name, $sendTo, $email, $messageBody) {
            $m->from('hio@hiolegends.com', 'HIO - Contact');

            $m->to($sendTo, '')->subject($email . ' sent a contact request.');
        });
//        } catch (\Exception $e) {
//            echo $e;
//        }

    }


    public function testemail()
    {
        $completed = multiexplode(array(","),"0");
       echo "c->".count($completed);

    }

}
