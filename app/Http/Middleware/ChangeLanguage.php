<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
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
        // app()->setLocale(local:'ar');       //in laravel 5
        app()->setlocale('AR'); 
        if( (isset($request->lang)) && ($request->lang == 'Eng') ){
            app()->setlocale('Eng'); 
        }


        return $next($request);
    }
}
