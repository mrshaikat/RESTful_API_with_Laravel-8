<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $token = $request -> header('APP_KEY');

        if($token != 'ABCDEFGHIJK'){

            return response() -> json(['message' => 'App key not Found'], 401);

        }
        return $next($request);
    }
}
