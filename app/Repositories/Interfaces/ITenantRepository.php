<?php

namespace App\Repositories\Interfaces;

use App\Models\Tenant;

interface ITenantRepository
{
    public function createTenant(string $id): Tenant;
    public function addDomain(Tenant $tenant, string $domain): void;
    public function delete(Tenant $tenant): void;
}