<?php

namespace App\Http\Middleware;

use Closure;
use Lcobucci\JWT\Signer\Key;

class checkPassword
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
        if( $request->api_password !== env('API_PASSWORD','f0mhpfW6tjNLT')){
            return response()->json(['message' => 'Unauthenticaated.']);
        }
        return $next($request);
    }
}
