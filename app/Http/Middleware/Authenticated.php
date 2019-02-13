<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authenticated
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
        //checking if the user is authenticated
        if (Auth::check()){
          return $next($request); //allow command to go to the controller
        }else{
          return redirect('/login');
        }

    }
}
