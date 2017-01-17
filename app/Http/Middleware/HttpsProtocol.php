<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17-01-2017
 * Time: 17:58
 */

namespace app\Http\Middleware;


use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') != 'local') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}