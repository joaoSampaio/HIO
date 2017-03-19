<?php namespace App\Http\Controllers;

use App;
use App\Model\Challenge;
use App\Model\FileHio;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Auth;
//use Mail;
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


        $ongoingChallenges = DB::table('challenges')

            ->where(function ($query) use ($idUser) {
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

        $myChallenges = DB::table('challenges')
            ->where(function ($query) use ($idUser) {
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

        $userFriends = $this->getAllFriends($idUser);


        return view('profile')->with('challenges', $ongoingChallenges)
            ->with('user', $user)
            ->with('endedChallenges', $endedChallenges)
            ->with('challengeCreated', $challengeCreated)
            ->with('myChallenges', $myChallenges)
            ->with('canBeFriend', $canBeFriend)
            ->with('userFriends', $userFriends);


    }


    public function getUserEndedChallenges($id)
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

        return json_encode(view('partials.challenge')->with('challenges', $endedChallenges)->render());
    }


    public function getUserCreatedChallenges($id)
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

        $myChallenges = DB::table('challenges')
            ->where(function ($query) use ($idUser) {
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

        return json_encode(view('partials.challenge')->with('challenges', $myChallenges)->render());
    }


    public function getUserOngoingChallenges($id)
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


        $ongoingChallenges = DB::table('challenges')

            ->where(function ($query) use ($idUser) {
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

        return json_encode(view('partials.challenge')->with('challenges', $ongoingChallenges)->render());
    }


    public function editProfile()
    {
        return view('edit_profile');
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

        $user->about = $request->input('about');

        if (!empty($request->input('sports'))) {
            $user->sports = implode(",", $request->input('sports'));
        } else {
            $user->sports = "";
        }


        $user->name = $request->input('name');
        $user->interests = $request->input('interests');


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

//        $user = User::where('id', Auth::user()->id)->first();
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
//        return Response::json([
//            'status' => 'success',
//        ], 200);
    }



    public function changeUserProfile(){

        $userId = Auth::user()->other_profile;
        if($userId != null){
            Auth::loginUsingId($userId);
        }
        return redirect()->back();
    }




}
