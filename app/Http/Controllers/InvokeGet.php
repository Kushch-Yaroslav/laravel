<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvokeGet extends Controller
{
    public function __invoke($id): JsonResponse
    {
        $getUser = User::findOrFail($id);
        return new JsonResponse($getUser,200);
    }
}
