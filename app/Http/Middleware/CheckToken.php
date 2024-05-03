<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckToken
{

    public function handle(Request $request, Closure $next): Response
    {
    if(!Auth::guard('api')->check()){
        return response()->json(['error'=>'Unauthorized'],403);
    }
        return $next($request);
    }
}
