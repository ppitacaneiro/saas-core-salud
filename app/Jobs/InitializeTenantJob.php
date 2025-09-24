<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Http\DTOs\TenantData;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class InitializeTenantJob implements ShouldQueue
{
    use Queueable;

    protected TenantData $dto;
    protected Tenant $tenant;

    /**
     * Create a new job instance.
     */
    public function __construct(TenantData $dto, Tenant $tenant)
    {
        $this->dto = $dto;
        $this->tenant = $tenant;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function () {
            Artisan::call('migrate', [
                '--path' => 'database/migrations/tenant',
                '--force' => true,
            ]);

            $seeder = new \Database\Seeders\Tenant\TenantDatabaseSeeder([
                'email' => $this->dto->adminEmail,
                'password' => $this->dto->adminPassword,
            ]);
            $seeder->run();
        });
    }
}
