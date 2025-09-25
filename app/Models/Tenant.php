<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected $fillable = [
        'id',
        'name',
        'contact_email',
        'phone',
        'address',
        'province_id',
        'municipality_id',
        'is_active',
        'subscription_start_date',
        'subscription_end_date',
        'trial_ends_at',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean',
        'subscription_start_date' => 'date',
        'subscription_end_date' => 'date',
        'trial_ends_at' => 'date',
    ];

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
