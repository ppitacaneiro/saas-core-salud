<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Http\DTOs\TenantData;
use Illuminate\Support\Facades\Log;
use App\Repositories\Interfaces\ITenantRepository;

class TenantRepository implements ITenantRepository
{
    public function createTenant(string $id, TenantData $data): Tenant
    {
        if (Tenant::where('id', $id)->exists()) {
            throw new \App\Exceptions\TenantAlreadyExistsException($id);
        }

        return Tenant::create([
            'id' => $id,
            'name' => $data->name,
            'contact_email' => $data->contactEmail,
            'phone' => $data->phone,
            'address' => $data->address,
            'province_id' => $data->provinceId,
            'municipality_id' => $data->municipalityId,
            'is_active' => $data->isActive,
            'plan_id' => $data->planId,
            'subscription_start_date' => $data->subscriptionStartDate,
            'subscription_end_date' => $data->subscriptionEndDate,
            'trial_ends_at' => $data->trialEndsAt,
            'data' => $data->data,
        ]);
    }

    public function addDomain(Tenant $tenant, string $domain): void
    {
        $tenant->domains()->create(['domain' => $domain]);
    }

    public function delete(Tenant $tenant): void
    {
        $tenant->delete();
        $tenant->domains()->delete();
    }
}
