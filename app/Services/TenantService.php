<?php

namespace App\Services;

use App\Http\DTOs\TenantData;
use Illuminate\Support\Facades\Artisan;
use App\Repositories\Interfaces\ITenantRepository;

class TenantService
{
    protected ITenantRepository $repository;

    public function __construct(ITenantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createTenant(TenantData $dto)
    {
        try {
            $tenant = $this->repository->createTenant($dto->id);
            $this->repository->addDomain($tenant, $dto->domain);

            $tenant->run(function () {
                Artisan::call('migrate', [
                    '--path' => 'database/migrations/tenant',
                    '--force' => true,
                ]);
            });

            return $tenant;
        } catch (\App\Exceptions\TenantAlreadyExistsException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new \Exception("Error al crear el tenant: {$e->getMessage()}");
        }
    }
}
