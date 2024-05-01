<?php

namespace App\Services\UserService;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

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

