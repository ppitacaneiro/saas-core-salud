<?php

namespace App\Http\DTOs;

class RegisterData
{
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
        );
    }
}