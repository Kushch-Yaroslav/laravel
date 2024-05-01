<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\RegisterRequest;
use App\Services\UserService\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private UserService $userService;
    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }

    /**
     * @return JsonResponse
     */
    public function getAllUsers(): JsonResponse
    {
        $findAllUsers = $this->userService->findAllUsers();
        return new JsonResponse($findAllUsers, 200);
    }

    /**
     * @param $userId
     * @return JsonResponse
     */
    public function show($userId): JsonResponse
    {
        $findOneUser = $this->userService->findUserById($userId);
        return new JsonResponse($findOneUser, 200);
    }

    /**
     * @param RegisterRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function editUser(RegisterRequest $request, string $id): JsonResponse
    {
        $updateUser = $this->userService->updateUser($id,$request->validated());
        return new JsonResponse(['updated'=>$updateUser], 200);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function removeUser(string $id): JsonResponse
    {
        $deleteUser = $this->userService->deleteUser($id);
        return new JsonResponse($deleteUser, 204);
    }
}
