<?php

namespace App\Http\DTOs;

class TenantData
{
    public string $id;

    public function __construct(string $id) {
        $this->id = $id;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['id'],
        );
    }
}
