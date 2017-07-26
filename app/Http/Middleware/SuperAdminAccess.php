<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdminAccess
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

        $user = Auth::user();

        if($user){
            if ( $user->hasRole('Admin')) {
                return $next($request);
            }
            elseif (!$user->hasRole('SuperAdmin')){
                return redirect('/home');
            }
        }


        return $next($request);


    }
}