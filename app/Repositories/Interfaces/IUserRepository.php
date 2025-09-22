<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function getUserByEmail(string $email);

    public function createUser(array $data);
}