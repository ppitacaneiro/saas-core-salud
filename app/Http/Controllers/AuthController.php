<?php

namespace App\Http\Controllers;

use App\Http\DTOs\LoginData;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\DTOs\RegisterData;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Container\Attributes\Auth;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function login(LoginRequest $request)
    {
        $loginData = LoginData::fromRequest($request->validated());
        $authData = $this->authService->login($loginData);

        return response()->json([
            'message' => 'Login successful',
            'data' => $authData
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $registerData = RegisterData::fromRequest($request->validated());
        // $user = $this->authService->register($registerData);

        return response()->json([
            'message' => 'Registration successful',
            // 'data' => $user (return user data if needed)
        ], 201);
    }
}
