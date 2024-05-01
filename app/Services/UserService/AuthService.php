<?php

namespace App\Services;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function createToken($credentials)
    {
        try{
            if(!$token = Auth::guard('api')->attempt($credentials)){
                return [false,'Invalid credentials'];
            }
        }catch (JWTException $exception){
            return [false,'Could not create token'];
        }
        return [true,$token];
    }
}

