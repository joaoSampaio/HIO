<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $redirectUrl = str_replace("http://localhost:8000","",$request->url());
                Session::set('_previous_url', $redirectUrl);
                print_r($redirectUrl);
                session()->put('url.intended', $request->url());
                return redirect()->guest('/auth/facebook');
//                return redirect()->action('SocialAuthController@redirectToProvider');
                //return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
