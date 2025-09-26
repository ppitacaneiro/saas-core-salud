<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\DTOs\PatientData;
use App\Http\Requests\PatientStoreRequest;

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

    public function store(PatientStoreRequest $request)
    {
        $data = PatientData::fromRequest($request->all());
        $patient = $this->patientService->createPatient($data);

        return response()->json([
            'message' => 'Patient created successfully',
            'data' => $patient
        ], 201);
    }
}
