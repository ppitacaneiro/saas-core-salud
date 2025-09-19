<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}