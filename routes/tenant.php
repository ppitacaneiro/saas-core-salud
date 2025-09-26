<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Tenant\PatientController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->prefix('tenant-api')->group(function () {
    Route::get('/status', function () {
        return response()->json(['status' => 'Tenant API is working'], 200);
    });

    Route::post('/login', [AuthController::class, 'login']);

    Route::prefix('patients')->middleware('auth:sanctum')->group(function () {
        Route::get('/', [PatientController::class, 'index']);
        Route::get('/paginate', [PatientController::class, 'paginate']);
        Route::post('/', [PatientController::class, 'store']);
    });
});
