<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Role;

class CheckRole
{

    public function handle(Request $request, Closure $next,Role ...$roles): Response
    {
        $roleValue = array_map(fn(Role $role)=>$role->value,$roles);
        $userRole = $request->user()?->role->value;

//        if(!in_array($userRole,$roleValue)){
//
//            return redirect();
//        }
        return $next($request);
    }
}
