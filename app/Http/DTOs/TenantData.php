<?php

namespace App\Http\DTOs;

class TenantData
{
    public string $id;
    public string $adminEmail;
    public string $adminPassword;

    public function __construct(string $id, string $adminEmail, string $adminPassword) {
        $this->id = $id;
        $this->adminEmail = $adminEmail;
        $this->adminPassword = $adminPassword;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['id'],
            $data['admin_email'],
            $data['admin_password']
        );
    }
}
