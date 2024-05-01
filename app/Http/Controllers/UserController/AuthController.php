<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\RegisterRequest;
use App\Models\User;
use App\Services\UserService\AuthService;
use App\Services\UserService\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthService $authService;
    private UserService $userService;

    public function __construct(AuthService $authService,UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    protected function register(RegisterRequest $request): JsonResponse
    {
    $user = new User($request->validated());
    $user->password = bcrypt($user->password);
    $user->save();
        return response()->json($user,201);
    }

    public function login(Request $request):JsonResponse
    {
        $credentials = $request->only('email','password');
        [$success, $token] = $this->authService->createToken($credentials);
        if(!$success){
            return response()->json(['error'=>'Unauthorized','message'=>$token],403);
        }
        $user = Auth::guard('api')->user();
        $role =$user->role;
        return response()->json(['token'=>$token,'role'=>$role],200);
    }
}
