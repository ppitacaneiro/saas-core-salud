<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'contact_email',
            'phone',
            'address',
            'province_id',
            'municipality_id',
            'postal_code',
            'plan_id',
            'is_active',
            'subscription_start_date',
            'subscription_end_date',
            'trial_ends_at',
        ];
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
