<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TenantAlreadyExistsException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::warning("Intento de crear un tenant duplicado: {$this->getMessage()}");
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request)
    {
        return response()->json([
            'error' => "El tenant con ID '{$this->getMessage()}' ya existe."
        ], 409);
    }
}
