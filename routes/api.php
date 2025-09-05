<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

Route::get('/status', function () {
    return response()->json(['status' => 'API is working']);
});

Route::post('/tenants', [TenantController::class, 'store']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
