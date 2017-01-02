<?php

namespace App\Http\Controllers;

use Socialite;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
//use Validator;
//use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Facebook;

class SocialAuthController extends Controller
{


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
//        strcmp
        if(str_contains(url()->previous(), 'challenge'))
            session()->put('url.intended', url()->previous());
//        print_r(url()->previous());
        return Socialite::driver('facebook')->scopes(['publish_actions', 'user_birthday', 'user_likes', 'user_friends', 'user_location'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        session()->put('user.temp', $user);
        try {
            $authUser = $this->findOrCreateUser($user);

            Auth::login($authUser, true);
            $url = Session::get('_previous_url', '/');
            Session::set('_previous_url', '/');
            $url = session()->pull('url.intended', '/');

            $this->getFriends();

            if ($authUser->photo == NULL) {

                try {
                    $urlImage = 'https://graph.facebook.com/v2.5/' . $authUser->facebook_id . '/picture?width=200&height=200';
    //                $extension = pathinfo($urlImage, PATHINFO_EXTENSION);
                    $extension = ".jpeg";

                    echo "extension:" . $extension;

                    $filename = md5($authUser->facebook_id . microtime()) . $extension;

                    $file = file_get_contents($urlImage);
                    $save = file_put_contents(base_path() . '/public/uploads/users/' . $filename, $file);

                    echo "save:" . $save;
                    if ($save) {
                        //transaction......
                        //                DB::beginTransaction();

                        $authUser->photo = $filename;
                        $authUser->save();

                    }
                } catch (\Exception $e) {
                    echo $e;
                    //delete if no db things........
    //                    File::delete('images/'. $filename);
    //                    DB::rollback();
                }
            }


            return redirect()->intended($url);
        } catch (\Exception $e) {
            echo 'Houve algo que nao veio do facebook!<br> possivelmente vou ter um outro form para preencher com dados em falta';
            echo $e;
            return redirect()->action('SocialAuthController@missingFB')->with('fbUser', $user);
        }
    }

    public function missingFB(){


        $birthdayLoc = session()->pull('user.birthday', null);
        $fbUser = session()->pull('user.temp', null);
        session()->put('user.temp', $fbUser);
        session()->put('user.birthday', $birthdayLoc);
        $distritos = ['Aveiro' => 'Aveiro',
            'Beja' => 'Beja',
            'Braga' => 'Braga',
            'Bragança' => 'Bragança',
            'Castelo Branco' => 'Castelo Branco',
            'Coimbra' => 'Coimbra',
            'Évora' => 'Évora',
            'Faro' => 'Faro',
            'Guarda' => 'Guarda',
            'Leiria' => 'Leiria',
            'Lisboa' => 'Lisboa',
            'Portalegre' => 'Portalegre',
            'Porto' => 'Porto',
            'Santarém' => 'Santarém',
            'Setúbal' => 'Setúbal',
            'Viana do Castelo' => 'Viana do Castelo',
            'Vila Real' => 'Vila Real',
            'Viseu' => 'Viseu'
        ];

        $birthday = null ;
        $location = null;
        if($birthdayLoc != null){
            $birthday = $birthdayLoc['birthday']? $birthdayLoc['birthday'] : null;
            $location = $birthdayLoc['location']? $birthdayLoc['location'] : null;
        }


        $data = ['name' => $fbUser->name,
                'email' => $fbUser->email,
                'facebook_id' => $fbUser->id,
                'gender' => $fbUser->user['gender'],
                'facebook_token' => $fbUser->token,
                'birthday' => $birthday,
                'location' => $location];


        return view('missingFB')->with("data", $data)->with("distritos", $distritos);
    }

    public function saveMissingFB(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'facebook_id' => 'required',
            'gender' => 'required',
            'facebook_token' => 'required',
            'birthday' => 'required',
            'location' => 'required',
        ]);


        $authUser =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'facebook_id' => $request->input('facebook_id'),
            'gender' => $request->input('gender'),
            'facebook_token' => $request->input('facebook_token'),
            'birthday' => $request->input('birthday'),
            'location' => $request->input('location')
        ]);

        Auth::login($authUser, true);
        $url = session()->pull('url.intended', '/');
        $this->getFriends();
        return redirect()->intended($url);

    }


    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $fbUser
     * @return User
     */
    private function findOrCreateUser($fbUser)
    {
        //print_r($fbUser);
        if ($authUser = User::where('facebook_id', $fbUser->id)->first()) {
            if ($authUser->facebook_token != $fbUser->token) {
                $authUser->facebook_token = $fbUser->token;
                $authUser->save();
            }
            return $authUser;
        }

        $data = $this->getBirthdayAndLocation($fbUser);

        if ($data != null) {
            session()->put('user.birthday', $data);
            $birthday = $data['birthday'];
            $location = $data['location'];

            return User::create([
                'name' => $fbUser->name,
                'email' => $fbUser->email,
                'facebook_id' => $fbUser->id,
                'gender' => $fbUser->user['gender'],
                'facebook_token' => $fbUser->token,
                'birthday' => $birthday,
                'activated' => true,
                'location' => $location
            ]);
        }else{
            return User::create([
                'name' => $fbUser->name,
                'email' => $fbUser->email,
                'facebook_id' => $fbUser->id,
                'activated' => true,
                'gender' => $fbUser->user['gender'],
                'facebook_token' => $fbUser->token]);
        }
    }


    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }

    public function createTemp($name){
        $authUser =  User::create([
            'name' => $name,
            'facebook_id' => 1,
            'email' => $name.'@ola.pt',
            'activated' => 1,
            'gender' => 'male']);

        Auth::login($authUser, true);
        return Redirect::to('/');
    }




    public function getBirthdayAndLocation($fbUser){


        $fb = new Facebook\Facebook([
            'app_id' => '948239501878979',
            'app_secret' => 'c48d7b6ef2d379c1dc9218863a394d20',
            'default_graph_version' => 'v2.5',
        ]);



        try {
            $response = $fb->get('/me?fields=birthday,location', $fbUser->token);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        try {
            $data = [
                'birthday' => $response->getGraphNode()['birthday'],
                'location' => $response->getGraphNode()['location']['name'],
            ];
        } catch (\Exception $e) {
            $data = null;
        }
        return $data;

    }


    public function getFriends(){

        $appsecret_proof= hash_hmac('sha256', Auth::user()->facebook_token, 'c48d7b6ef2d379c1dc9218863a394d20');
        $url="https://graph.facebook.com/me/friends?access_token=".Auth::user()->facebook_token . "&appsecret_proof=".$appsecret_proof;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true)['data'];

        $user = Auth::user();
        $friends = $user->friends;
        $friends = json_decode($friends, true);
        if(!is_array($friends)){
            $friends = array();
        }
        $save = false;
        foreach($data as $key => $value){
            $idFacebookFriend =  $value['id'];

            //ja conheço o amigo
            if (!array_key_exists($idFacebookFriend, $friends)) {
                $friends[$idFacebookFriend] = array(
                    "name" => $value['name'],
                    "id" => $idFacebookFriend,
                    "id_user" => -1
                );
                $save = true;
            }

            if($friends[$idFacebookFriend]['id_user'] < 0){
                if ($friendUser = User::where('facebook_id', $idFacebookFriend)->first()) {
                    $friends[$idFacebookFriend]['id_user'] = $friendUser->id;
                    $save = true;
                }
            }
        }
        if($save){
            $user->friends = json_encode($friends);
            $user->save();
        }
        echo $user->friends;

    }


}
