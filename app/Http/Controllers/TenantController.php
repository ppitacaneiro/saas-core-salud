<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\DTOs\TenantData;
use App\Services\TenantService;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\StoreTenantRequest;

class TenantController extends Controller
{
    protected TenantService $service;

    public function __construct(TenantService $service)
    {
        $this->service = $service;
    }

    public function store(StoreTenantRequest $request)
    {
        $dto = TenantData::fromRequest($request->validated());
        $tenant = $this->service->createTenant($dto);

        return response()->json($tenant, 201);
    }
}
