<?php

namespace App\Http\Middleware;

use App\Service\AuthApi;
use Closure;

class AppToken
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
        if(AuthApi::authenticate($request->header('token'))){

            return response()->json([
                'Status' => 'Denied'
            ]);
        }
        return $next($request);
    }
}
