<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class UserService
{
    /**
     * @param $userId
     * @return User|null
     */
    public function findUserById($userId): ?User
    {
        return User::find($userId);
    }

    /**
     * @return Collection
     */
    public function findAllUsers(): Collection
    {
        return User::all();
    }

    /**
     * @param $userId
     * @return null
     */
    public function deleteUser($userId)
    {
        return User::destroy($userId);
    }

    /**
     * @param int $userId
     * @param array $data
     * @return User|null
     */
    public function updateUser(int $userId, array $data): ?User
    {
        $user= User::findOrFail($userId);
        $user->update(
            ['name'=>$data['name'],
             'email'=>$data['email'],
             'password'=>bcrypt($data['password']),
             'role'=>$data['role']]
        );
        return $user->fresh();
    }
}

