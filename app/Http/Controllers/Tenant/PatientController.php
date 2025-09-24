<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct(private \App\Services\Tenant\PatientService $patientService) {}

    public function index()
    {
        $patients = $this->patientService->getAllPatients();

        return response()->json([
            'message' => 'Patients retrieved successfully',
            'data' => $patients
        ], 200);
    }

    public function paginate(Request $request)
    {
        $perPage = $request->input('per_page', 15);

        $paginatedPatients = $this->patientService->getPaginatedPatients((int)$perPage);

        return response()->json([
            'message' => 'Paginated patients retrieved successfully',
            'data' => $paginatedPatients
        ], 200);
    }
}
