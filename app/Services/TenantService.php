<?php

namespace App\Services;

use Illuminate\Support\Str;
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
        $slug = Str::slug($dto->id);
        if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
            throw new \App\Exceptions\InvalidTenantNameException($slug);
        }

        $baseDomain = config('tenancy.base_domain');
        try {
            $tenant = $this->repository->createTenant($slug);
            $domain = "{$tenant->id}.{$baseDomain}";
            $this->repository->addDomain($tenant, $domain);

            $tenant->run(function () {
                Artisan::call('migrate', [
                    '--path' => 'database/migrations/tenant',
                    '--force' => true,
                ]);
            });

            return [
                'id' => $tenant->id,
                'domain' => $domain,
            ];
        } catch (\App\Exceptions\TenantAlreadyExistsException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new \Exception("Error al crear el tenant: {$e->getMessage()}");
        }
    }
}
