<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TenantController extends Controller
{
    public function store(Request $request)
    {
        $tenant = Tenant::create([
            'id' => $request->input('id'),
        ]);

        $tenant->domains()->create([
            'domain' => $request->domain,
        ]);

        $tenant->run(function () {
            Artisan::call('migrate', [
                '--path' => 'database/migrations/tenant',
                '--force' => true
            ]);
        });

        return response()->json($tenant);
    }
}
