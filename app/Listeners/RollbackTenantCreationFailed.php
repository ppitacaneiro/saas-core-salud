<?php

namespace App\Listeners;

use App\Models\Tenant;
use Illuminate\Support\Facades\Log;
use App\Events\TenantCreationFailed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Interfaces\ITenantRepository;

class RollbackTenantCreationFailed implements ShouldQueue
{
    use InteractsWithQueue;

    protected ITenantRepository $tenantRepository;

    /**
     * Create the event listener.
     */
    public function __construct(ITenantRepository $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * Handle the event.
     */
    public function handle(TenantCreationFailed $event): void
    {
        $tenant = Tenant::find($event->tenantId);

        if ($tenant) {
            $this->tenantRepository->delete($tenant);
        }
    }
}
