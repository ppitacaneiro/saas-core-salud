<?php

namespace App\Repositories\Interfaces;

use App\Models\Tenant;
use App\Http\DTOs\TenantData;

interface ITenantRepository
{
    public function createTenant(string $id, TenantData $data): Tenant;
    public function addDomain(Tenant $tenant, string $domain): void;
    public function delete(Tenant $tenant): void;
}