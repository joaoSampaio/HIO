<?php

namespace App\Http\Controllers\Auth;

use App\Factories\ActivationFactory;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $activationFactory;

    public function __construct(ActivationFactory $activationFactory)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationFactory = $activationFactory;
    }
//    public function __construct()
//    {
//        $this->middleware('guest', ['except' => 'logout']);
//    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name-reg' => 'required|max:255',
            'email-reg' => 'required|email|max:255|unique:users,email',
            'password-reg' => 'required|confirmed|min:6',
        ]);
    }


    protected function validatorBrand(array $data)
    {
        return Validator::make($data, [
            'name-brand' => 'required|max:255',
            'address-brand' => 'required|max:255',
            'email-brand' => 'required|email|max:255|unique:users,email',
            'password-brand' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        return User::create([
//            'name' => $data['name'],
            'name' => $data['name-reg'] ." ". $data['apelido-reg'],
            'email' => $data['email-reg'],
            'password' => bcrypt($data['password-reg']),
        ]);
    }

    protected function createBrand(array $data)
    {

        return User::create([
//            'name' => $data['name'],
            'name' => $data['name-brand'],
            'email' => $data['email-brand'],
            'role' => 'brand',
            'address' => $data['address-brand'],
            'password' => bcrypt($data['password-brand']),
        ]);
    }

    public function registerBrand(Request $request)
    {
        $validator = $this->validatorBrand($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
//        echo "->>>>" . json_encode($request->all());
        $user = $this->createBrand($request->all());

        $this->activationFactory->sendActivationMailBrand($user);

        return redirect('/login')->with('activationStatus', true);
    }


    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
//        echo "->>>>" . json_encode($request->all());
        $user = $this->create($request->all());

        $this->activationFactory->sendActivationMail($user);

        return redirect('/login')->with('activationStatus', true);
    }

    public function activateUser($token)
    {
        if ($user = $this->activationFactory->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->activated && $user->facebook_id == NULL) {
            $this->activationFactory->sendActivationMail($user);
            auth()->logout();
            return back()->with('activationWarning', true);
        }
        return redirect()->intended($this->redirectPath());
    }

}