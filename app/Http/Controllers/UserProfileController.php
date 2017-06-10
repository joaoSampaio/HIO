<?php namespace App\Http\Controllers;

use App;
use App\Model\CategoryLevel;
use App\Model\Challenge;
use App\Model\ChallengeCategory;
use App\Model\ChallengeLevelUp;
use App\Model\ChallengeLevelUpGroup;
use App\Model\FileHio;
use Carbon\Carbon;
use Auth;
//use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
//use Mail;
use Ramsey\Uuid\Uuid;
use Storage;
use App\Model\User;
use Illuminate\Pagination\LengthAwarePaginator;
use FFMpeg\Format\Video;
use Illuminate\Support\Facades;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;


use App\Http\Traits\FriendTrait;


class UserProfileController extends Controller
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

        $sportsSelected = multiexplode(array(",",".","|",":"),$user->sports);
//        $catLevel =CategoryLevel::where('user_id', $idUser)->whereIn('category_id', $sportsSelected)->get();
        $categories = DB::table('challenge_category')->whereIn('challenge_category.id', $sportsSelected)
            ->leftJoin('category_level', function($join) use ($idUser)
            {
                $join->on('category_level.user_id', '=',  DB::raw("'".$idUser."'"));
                $join->on('category_level.category_id','=', 'challenge_category.id');
            })
            ->select('challenge_category.name', 'challenge_category.id', 'category_level.level')->get();

        $selectedProfileCategory = null;
        $userMaxLevel = 0;
        if($user->selected_category_id > 0){
            //$selectedProfileCategory = DB::table('challenge_category')->find($user->selected_category_id);


                if($categoryLevel = CategoryLevel::where('user_id', $user->id)->where('category_id',$user->selected_category_id)->first()){
                    $userMaxLevel = $categoryLevel->level;
                }
        }

        $endedChallenges = Challenge::
            where(function ($query) use ($idUser) {
                $query->whereIn('challenges.id', function ($query) use ($idUser)
                {
                    $query->from('challenge_user')
                        ->select('challenge_id')
                        ->where('user_id', $idUser);
                })
                    ->OrWhere('creator_id', $idUser);
            })
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


        $ongoingChallenges = Challenge::
            where(function ($query) use ($idUser) {
                $query->whereIn('challenges.id', function ($query) use ($idUser)
                {
                    $query->from('challenge_user')
                        ->select('challenge_id')
                        ->where('user_id', $idUser);
                })
                    ->OrWhere('creator_id', $idUser);
            })
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->where('closed', '=', 0)
            ->where('deadLine', '>', $now)
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);

        $myChallenges = Challenge::
            where(function ($query) use ($idUser) {
                $query->whereIn('challenges.id', function ($query) use ($idUser)
                {
                    $query->from('challenge_user')
                        ->select('challenge_id')
                        ->where('user_id', $idUser);
                })
                    ->OrWhere('creator_id', $idUser);
            })
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'myChallenges', $page = null);


        $canBeFriend = false;
        if (Auth::check() && Auth::user()->id != $idUser && Auth::user()->other_profile != $idUser) {
            $canBeFriend = $this->canBeFriend($idUser);
        }

        $userFriends = $this->getAllFriends($idUser, NULL, 6);
        if(Auth::user()->id == $idUser)
            $friendsMessage = 'You <span> are Friend with </span>';
        else
            $friendsMessage = $user->name .'<span> is Friend with </span>';
        $count = 0;
        foreach( $userFriends as $people){
            $count++;
            $friendsMessage = $friendsMessage .' '.$people->name . ',';
            if($count >= 2)
                break;
        }
        $friendsMessage = rtrim($friendsMessage, ",");
        if($userFriends->total() > 2)
            $friendsMessage = $friendsMessage . ' <span> and </span>' . ($userFriends->total() - $count) . ' other.';
        elseif (Auth::user()->id == $idUser && $userFriends->total() == 0){
            $friendsMessage = $user->name .'<span> is not socializing in the HIO yet</span>';
        } elseif (Auth::user()->id != $idUser && $userFriends->total() == 0){
            $friendsMessage = '<span> Time to challenge '.getFirstName($user->name).'</span>';
        }


        return view('profile')->with('ongoingChallenges', $ongoingChallenges)
            ->with('user', $user)
            ->with('endedChallenges', $endedChallenges)
            ->with('challengeCreated', $challengeCreated)
            ->with('myChallenges', $myChallenges)
            ->with('canBeFriend', $canBeFriend)
            ->with('friendsMessage', $friendsMessage)
            ->with('userFriends', $userFriends)
            ->with('categories', $categories)
            ->with('selectedProfileCategory', $selectedProfileCategory)
            ->with('userMaxLevel', $userMaxLevel)
            ;


    }


    public function getUserEndedChallenges($id, Request $request)
    {

        $idUser = $id;
        $user = null;
        $showPrivate = false;
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $showPrivate = true;

        } else if ($user = User::where('id', $id)->first()) {

        } else {
            //rever user nao existe
            return view('home')->with('authUser', "");
        }

        $endedChallenges = Challenge::
        where(function ($query) use ($idUser) {
                $query->whereIn('challenges.id', function ($query) use ($idUser)
                {
                    $query->from('challenge_user')
                        ->select('challenge_id')
                        ->where('user_id', $idUser);
                })
                    ->OrWhere('creator_id', $idUser);
            })
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

        $showCreate = $request->input('showcreate');

        return json_encode(view('partials.challenge')->with('challenges', $endedChallenges)
            ->with('showCreate',$showCreate)->render());
    }


    public function getUserCreatedChallenges($id, Request $request)
    {

        $idUser = $id;
        $user = null;
        $now = Carbon::now();
        $showPrivate = false;
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $showPrivate = true;

        } else if ($user = User::where('id', $id)->first()) {
            $found = true;
        } else {
            //rever user nao existe
            return view('home')->with('authUser', "");
        }

        $myChallenges = Challenge::where(function ($query) use ($idUser) {
                $query->whereIn('challenges.id', function ($query) use ($idUser)
                {
                    $query->from('challenge_user')
                        ->select('challenge_id')
                        ->where('user_id', $idUser);
                })
                    ->OrWhere('creator_id', $idUser);
            })
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->orderBy('deadLine', 'desc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'myChallenges', $page = null);

        $showCreate = $request->input('showcreate');
        return json_encode(view('partials.challenge')->with('challenges', $myChallenges)
            ->with('showCreate',$showCreate)->render());
    }


    public function getUserOngoingChallenges($id, Request $request)
    {

        $idUser = $id;
        $user = null;
        $now = Carbon::now();
        $showPrivate = false;
        if (strcmp($id, 'me') == 0 || (Auth::check() && Auth::user()->id == $id)) {
            $idUser = Auth::user()->id;
            $showPrivate = true;

        } else if ($user = User::where('id', $id)->first()) {
            $found = true;
        } else {
            //rever user nao existe
            return view('home')->with('authUser', "");
        }


        $ongoingChallenges = Challenge::where(function ($query) use ($idUser) {
                $query->whereIn('challenges.id', function ($query) use ($idUser)
                {
                    $query->from('challenge_user')
                        ->select('challenge_id')
                        ->where('user_id', $idUser);
                })
                    ->OrWhere('creator_id', $idUser);
            })
            ->when(!$showPrivate, function ($query) {
                return $query->where('challenges.public', '=', 1);
            })
            ->where('closed', '=', 0)
            ->where('deadLine', '>', $now)
            ->orderBy('deadLine', 'asc')
            ->select('challenges.*')->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ongoing', $page = null);

        $showCreate = $request->input('showcreate');
        return json_encode(view('partials.challenge')->with('challenges', $ongoingChallenges)
            ->with('showCreate',$showCreate)->render());
    }


    public function editProfile()
    {

        $categories = ChallengeCategory::where('visible', '=', 1)->get();
        return view('edit_profile')->with('categories',$categories);
    }

    public function fixPhotos()
    {
        $files = File::allFiles('img/categories_thumb/');
        foreach ($files as $fileName) {
            $image = Image::make(sprintf('%s', $fileName))->fit(200)->save();
        }
    }


    public function post_editProfile(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->first();
//        if ($request->hasFile('file')) {
//            $file = $request->file('file');
//            $fileNameNoExtension = md5($user->email);
//            $fileName = $fileNameNoExtension . '.' .
//                $file->getClientOriginalExtension();
//
//            $type = 0;
//            $mimeType = $request->file('file')->getMimeType();
//            if (substr($mimeType, 0, 5) == 'image') {
//                $file->move('uploads/users/', $fileName);
//                $image = Image::make(sprintf('uploads/users/%s', $fileName))->fit(200)->save();
//
//                $user->photo = $fileName;
//            }
//        }

        $user->about = strip_tags($request->input('about'));

        if (!empty($request->input('sports'))) {
            $user->sports = implode(",", $request->input('sports'));
        } else {
            $user->sports = "";
        }


        $user->name = strip_tags($request->input('name'));
        $user->interests = strip_tags($request->input('interests'));


        $user->save();
        return redirect()->action('UserProfileController@userProfile', 'me');
    }

    public function getProfileImage($id)
    {
        if ($user = User::where('id', $id)->first()) {
            if ($user->photo != "") {

//                $storagePath = storage_path('/uploads/users/' . $user->photo);
//
//                return Image::make($storagePath)->response();
                //Cache-Control: max-age=0, must-revalidate
//                return response()->file(base_path() . '/public/uploads/users/' . $user->photo)->header('Cache-Control', 'max-age=0, must-revalidate');
                return Redirect::to('/uploads/users/'.$user->photo);
            }
        }
        return response()->file(base_path() . '/public/uploads/users/default_user.png')->header('Cache-Control', 'max-age=0, must-revalidate');
    }







    public function postUpload()
    {
        $form_data = Input::all();

        $rules = [
            'img' => 'required|mimes:png,gif,jpeg,jpg,bmp'
        ];
        $messages = [
        'img.mimes' => 'Uploaded file is not in image format',
        'img.required' => 'Image is required'
    ];

        $validator = Validator::make($form_data, $rules, $messages);

        if ($validator->fails()) {

            return Response::json([
                'status' => 'error',
                'message' => $validator->messages()->first(),
            ], 200);

        }

        $photo = $form_data['img'];
        $allowed_filename = md5(Auth::user()->id);
        $filename_ext = 'cropped-' . $allowed_filename .'.jpg';

        $manager = new ImageManager();
        $image = $manager->make( $photo )->encode('jpg')->save('uploads/users/' . $filename_ext );

        if( !$image) {

            return Response::json([
                'status' => 'error',
                'message' => 'Server error while uploading',
            ], 200);

        }



        return Response::json([
            'status'    => 'success',
            'url'       => '/uploads/users/' . $filename_ext,
            'width'     => $image->width(),
            'height'    => $image->height()
        ], 200);
    }


    public function postCrop()
    {
        $form_data = Input::all();
        $image_url = $form_data['imgUrl'];

        // resized sizes
        $imgW = $form_data['imgW'];
        $imgH = $form_data['imgH'];
        // offsets
        $imgY1 = $form_data['imgY1'];
        $imgX1 = $form_data['imgX1'];
        // crop box
        $cropW = $form_data['width'];
        $cropH = $form_data['height'];
        // rotation angle
        $angle = $form_data['rotation'];

        $filename_array = explode('/', $image_url);
        $filename = $filename_array[sizeof($filename_array)-1];

        $allowed_filename = md5(Auth::user()->id);
        $allowed_filenameNew = md5(Auth::user()->id . microtime());
        $image_url = 'uploads/users/cropped-'. $allowed_filename .'.jpg';


        $manager = new ImageManager();
        $image = $manager->make( $image_url );
        $image->resize($imgW, $imgH)
            ->rotate(-$angle)
            ->crop($cropW, $cropH, $imgX1, $imgY1)
            ->save('uploads/users/' . $allowed_filenameNew . '.jpg');

        if( !$image) {

            return Response::json([
                'status' => 'error',
                'message' => 'Server error while uploading',
            ], 200);

        }
        Auth::user()->photo = $allowed_filenameNew . '.jpg';
        Auth::user()->save();
        File::delete(base_path() . '/public/uploads/users/cropped-'. $allowed_filename .'.jpg');
        return Response::json([
            'status' => 'success',
            'url' => '/uploads/users/' . $allowed_filenameNew. '.jpg'
        ], 200);

    }

    public function upgradeToTrainer(Request $request)
    {

        if(Auth::user()->role == "admin"){

            $userId = $request->input('user_id');
            $user = User::find($userId);
            //create profile e add link entre perfis

            $userCopy = User::create([
                'number_profile' => 1,
                'other_profile' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => "trainer",
                'activated' => true,
                'password' => bcrypt(md5("ola". microtime())),
            ]);

            $user->other_profile = $userCopy->id;
            $user->save();

            //ALTER TABLE users DROP INDEX users_email_unique
            //ALTER TABLE users ADD UNIQUE users_email_profile_unique (email, number_profile);
        }

        return Response::json([
            'status' => 'success',
        ], 200);
    }

    public function createNormalUserByTrainer(){
        if(Auth::user()->role == "trainer" && Auth::user()->other_profile == NULL){

            $user = Auth::user();
            //create profile e add link entre perfis

            $userCopy = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'role' => "",
                'number_profile' => 1,
                'other_profile' => $user->id,
                'activated' => true,
                'password' => bcrypt(md5("ola". microtime())),
            ]);

            $user->other_profile = $userCopy->id;
            $user->save();
            \Session::flash('createdNormal', 'true');
            $this->changeUserProfile();

            //ALTER TABLE users DROP INDEX users_email_unique
            //ALTER TABLE users ADD UNIQUE users_email_profile_unique (email, number_profile);
        }
        return redirect()->action('UserProfileController@editProfile');
    }

    public function changeUserProfile(){

        $userId = Auth::user()->other_profile;
        if($userId != null){
            Auth::loginUsingId($userId);
        }
        return redirect()->back();
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }

    public function changePassword()
    {
        return view('auth.passwords.change');
    }



    public function postCredentials(Request $request)
    {
        if(Auth::Check())
        {
//            Auth::User()->password = bcrypt('zeze');
//            Auth::User()->save();

            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
//                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {
                $current_password = Auth::User()->password;

                if(Hash::check($request_data['current-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    return "ok";
                }
                else
                {
                    $validator->errors()->add('current-password', 'Please enter correct current password');
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }

    public function showLvlUp()
    {

        $selectedProfileCategory = null;
        $levelUpChallenges = null;
        $userLevelCategory = 0;
        $categoryLevel = null;
        $hasFailed = false;
        $canRetry = false;

        if(Auth::User()->selected_category_id > 0){
            $selectedProfileCategory = DB::table('challenge_category')->find(Auth::User()->selected_category_id);

            if($categoryLevel = CategoryLevel::where('user_id', Auth::User()->id)->where('category_id',$selectedProfileCategory->id)->first()){
                $userLevelCategory = $categoryLevel->level;
                $deadLine = $categoryLevel->deadLineLvl;


                //se o deadline exceder em 37 horas a data actual e não tiver completado todos os desafios, então pode ser fechado
                if($deadLine > 0 ){
                    $deadLine = Carbon::parse($deadLine);
                    $now = new DateTime();

                    //pode voltar a tentar fazer o desafio
                    $isValid = $now < $deadLine;
                    if ($isValid ||  $categoryLevel->deadLineLvl == 0) {
                        $canRetry = true;
                    }

                    //add hour 37 em vez de 36 pelo sim pelo nao
                    $deadLine = $deadLine->addHours(36);

                    $isValid = $now < $deadLine;
                    if (!$isValid) {


                        //'title','sub_title', 'category_id', 'level', 'difficulty', 'group_challenge'
                        $groups = ChallengeLevelUp::where('category_id', '=', $categoryLevel->category_id)
                            ->where('level', '=', $categoryLevel->level)->groupBy('group_challenge')->get();

                        echo "<br>getCountCompleted:".$categoryLevel->getCountCompleted();
                        echo "<br>count".count($groups);
                        if($categoryLevel->getCountCompleted() < count($groups)){
                            $hasFailed = true;
                        }
                    }
                }else{
                    //o deadline está a 0000 pode começar de novo
                    $canRetry = true;
                }




            }
            $levelUpChallenges = ChallengeLevelUp::where('category_id',Auth::User()->selected_category_id)
                ->where('level',$userLevelCategory)->orderBy('group_challenge', 'asc')->get();

            $levelUpChallenges = new ChallengeLevelUpGroup($levelUpChallenges);
        }

        return view('levelup')
            ->with('levelUpChallenges', $levelUpChallenges)
            ->with('selectedProfileCategory', $selectedProfileCategory)
            ->with('level', $userLevelCategory)
            ->with('categoryLevel', $categoryLevel)
            ->with('hasFailed', $hasFailed)
            ->with('canRetry', $canRetry);
    }


    public function selectCategory(Request $request){

        $categoryId= $request->input('category_id');
        Auth::User()->selected_category_id = $categoryId;
        Auth::User()->save();

        return redirect()->action('UserProfileController@userProfile', 'me');
    }


    public function resetLvlUp(Request $request){

        if(Auth::User()->selected_category_id > 0) {
            $selectedProfileCategory = DB::table('challenge_category')->find(Auth::User()->selected_category_id);

            if ($categoryLevel = CategoryLevel::where('user_id', Auth::User()->id)->where('category_id', $selectedProfileCategory->id)->first()) {
                $categoryLevel->inProgress = "";
                $categoryLevel->completedGroups = "";
                $categoryLevel->failedGroups = "";
                $categoryLevel->deadLineLvl = null;
                $categoryLevel->save();
            }

        }
        return redirect()->action('UserProfileController@showLvlUp');
    }


    public function createCategoryChallenge(Request $request){

        $challengeLevelUpId =  $request->input('challenge_lvl_up_id');

//        if(Challenge::where('creator_id',Auth::User()->id)->where('challenge_lvl_up_id', $challengeLevelUpId)->first()){
//            return "false";
//        }

        if($challengeLvlUp = ChallengeLevelUp::find($challengeLevelUpId)){

            $title = $challengeLvlUp->title;
            $description = $challengeLvlUp->title . " " . $challengeLvlUp->sub_title;
            $creator_id = Auth::user()->id;
            $public = 1;
            $uuid = Uuid::uuid4();
            $secret = 0;
            $reward = "";
            $penalty = "";
            $categoryId = $challengeLvlUp->category_id;

            $bExists = false;
            $existingLevel = null;
            if($level = CategoryLevel::where('user_id', Auth::User()->id)
                ->where('category_id',$categoryId)
                ->where('level',$challengeLvlUp->level)->first()){
                $deadLine = $level->deadLineLvl;
                if($level->deadLineLvl == 0){
                    $now = Carbon::now();
                    $deadLine = $now->addDays(7);
                }

                $existingLevel = $level;
                $bExists = true;



            }else{
                $now = Carbon::now();
                $deadLine = $now->addDays(7);
            }




            $challenge = new Challenge(['title' => $title, 'creator_id' => $creator_id, 'challenge_lvl_up_id' => $challengeLevelUpId,
                'description' => $description, 'category_id' => $categoryId, 'reward' => $reward, 'penalty' => $penalty,
                'deadLine' => $deadLine, 'uuid' => $uuid, 'public' => $public, 'secret' => $secret,]);
            Auth::user()->challenges()->save($challenge);

            if($bExists){

                if(strlen( $existingLevel->inProgress) > 0){
                    $groupsInProgress = json_decode($existingLevel->inProgress, true);
                }else{
                    $groupsInProgress = array();
                }


                //$groupsInProgress = multiexplode(array(",",".","|",":"),$level->inProgress);

                //ainda nao está a fazer um desafio daquele grupo de dificuldades
                if (!array_key_exists($challengeLvlUp->group_challenge, $groupsInProgress)) {
                    $groupsInProgress[$challengeLvlUp->group_challenge] = $challenge->uuid;
                }else{
                    //o utilizador ja esta a fazer esse desafio
                    return "false";
                }

                //guarda os grupos em progresso separados por virgula
                $existingLevel->inProgress  = json_encode($groupsInProgress);
                $existingLevel->deadLineLvl = $deadLine;
                $existingLevel->save();


            }else{
                //nao existe ainda
                $groupsInProgress = array();
                $groupsInProgress[$challengeLvlUp->group_challenge] = $challenge->uuid;
                $level = new CategoryLevel(['category_id' => $categoryId,
                    'user_id' => Auth::user()->id,
                    'deadLineLvl' => $deadLine, 'level' => $challengeLvlUp->level,
                    'inProgress' => json_encode($groupsInProgress)]);

                $level->save();
            }
            return View('partials.create_result')->with('challengeId', $uuid);

        }



        return false;



    }












}
