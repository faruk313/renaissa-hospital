<?php

namespace App\Http\Middleware;

use Closure;

class AdminGroup
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
        //dd(auth()->user()->hasRole('admin'));
        //if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('front_desk') || auth()->user()->hasRole('doctor')){
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('front_desk') || auth()->user()->hasRole('doctor')){
           return $next($request);
        }
    }
}
