<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use DateTime;


class verificarDias
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
           $date = new DateTime;

           $d = new DateTime(auth()->user()->last_login); 
           $dias =$d->diff($date);

  

        if($dias->days > 1)
        {
           
          return redirect(RouteServiceProvider::SESION);


        }

     

           



        return $next($request);
    }
}
