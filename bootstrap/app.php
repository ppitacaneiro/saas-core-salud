<?php

use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (PDOException|QueryException $e, $request) {
            return response()->json([
                'message' => 'Database Error',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ], 500);
        });
    })->create();
