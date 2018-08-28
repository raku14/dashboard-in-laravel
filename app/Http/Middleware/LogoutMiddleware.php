<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class LogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('email')){
            return $next($request);    
        }
        return redirect::to('auth/login');
    }
}
