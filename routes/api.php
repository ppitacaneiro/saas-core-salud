<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LocationController;

Route::get('/status', function () {
    return response()->json(['status' => 'API is working'], 200);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/tenants', [
    TenantController::class, 'store']
)->middleware('auth:sanctum');

Route::prefix('locations')->middleware('auth:sanctum')->group(function () {
    Route::get('/communities', [LocationController::class, 'communities']);
    Route::get('/communities/{id}/provinces', [LocationController::class, 'provinces']);
    Route::get('/provinces/{id}/municipalities', [LocationController::class, 'municipalities']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
