<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InvalidTenantNameException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::error('Invalid tenant name exception occurred: ' . $this->getMessage());
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request)
    {
        return response()->json([
            'error' => 'Nombre de tenant inválido.'
        ], 422);
    }
}
