<?php

namespace App\Services;

use App\Http\DTOs\LoginData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Repositories\Interfaces\IUserRepository;

class AuthService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginData $dto)
    {
        $user = $this->userRepository->getUserByEmail($dto->email);

        if (!$user || !Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages([
                'error' => ['Credenciales incorrectas.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'auth_token' => $token,
            'token_type' => 'Bearer'
        ];
    }

    public function logout()
    {
        // Implement logout logic here
    }
}