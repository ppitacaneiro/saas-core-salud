<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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

        $exceptions->render(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*') || $request->is('tenant-api/*')) {
                return response()->json([
                    'message' => 'Route not found',
                ], 404);
            }
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            if ($request->is('api/*') || $request->is('tenant-api/*')) {
                return response()->json([
                    'message' => 'Method not allowed',
                ], 405);
            }
        });

        $exceptions->render(function (AuthenticationException $e, $request) {
            if ($request->is('api/*') || $request->is('tenant-api/*')) {
                return response()->json([
                    'message' => 'Unauthenticated',
                ], 401);
            }
        });

        $exceptions->render(function (ValidationException $e, $request) {
            if ($request->is('api/*') || $request->is('tenant-api/*')) {
                return response()->json([
                    'message' => 'Validation Error',
                    'errors' => $e->errors(),
                ], 422);
            }
        });

        $exceptions->render(function (\Throwable $e, $request) {
            if ($request->is('api/*') || $request->is('tenant-api/*')) {
                return response()->json([
                    'message' => 'Server Error',
                    'error' => $e->getMessage(),
                ], 500);
            }
        });
    })->create();
