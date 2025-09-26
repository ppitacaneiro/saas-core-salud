<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Http\DTOs\TenantData;
use Exception;
use Illuminate\Support\Facades\Log;
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
        try {
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
        } catch (\Exception $e) {
            throw new \Exception("Error al inicializar el tenant: {$e->getMessage()}");
        }
    }

    public function failed(Exception $exception): void
    {
        Log::info("El job InitializeTenantJob ha fallado: {$exception->getMessage()}");
    }
}
