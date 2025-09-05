<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Interfaces\ITenantRepository;

class TenantRepository implements ITenantRepository
{
    public function createTenant(string $id): Tenant
    {
        if (Tenant::where('id', $id)->exists()) {
            throw new \App\Exceptions\TenantAlreadyExistsException($id);
        }

        return Tenant::create([
            'id' => $id,
        ]);
    }

    public function addDomain(Tenant $tenant, string $domain): void
    {
        $tenant->domains()->create(['domain' => $domain]);
    }
}
