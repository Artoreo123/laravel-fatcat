<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class User
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
        //return $next($request);
        if( Auth::check() && Auth::user()->isUser() ) {
            Auth::user()->getTypeuser();
            return $next($request);
        }
        /*else {
            abort(403, 'Unauthorized action.');
        }*/
    }

}
