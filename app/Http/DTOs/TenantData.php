<?php

namespace App\Http\DTOs;

class TenantData
{
    public string $id;
    public string $domain;

    public function __construct(string $id,string $domain) {
        $this->id = $id;
        $this->domain = $domain;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['id'],
            $data['domain']
        );
    }
}
