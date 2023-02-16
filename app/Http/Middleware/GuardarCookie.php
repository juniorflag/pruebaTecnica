<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cookie;

class GuardarCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(auth()->user()->hasRole('Role 1') &&  $_SERVER["REMOTE_ADDR"] == "127.0.0.1")
        {
            

            $origin_sesion =  Cookie::queue('origin_sesion', $_SERVER["REMOTE_ADDR"]  ,120);
        }

        return $next($request);

    }
}
