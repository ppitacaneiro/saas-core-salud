<?php

namespace App\Events;

use App\Models\Tenant;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class TenantCreationFailed
{
    use Dispatchable, SerializesModels;

    public string $tenantId;

    /**
     * Create a new event instance.
     */
    public function __construct(string $tenantId)
    {
        $this->tenantId = $tenantId;
    }
}
