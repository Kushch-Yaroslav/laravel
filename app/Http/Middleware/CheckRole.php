<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Role;

class CheckRole
{

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = $request->user('api') ? $request->user('api')->role:null;

        foreach ($roles as $role) {
        if($userRole===$role){
            return $next($request);
        }}
        return response()->json(['message' => 'Not permission'],403);
    }
}
