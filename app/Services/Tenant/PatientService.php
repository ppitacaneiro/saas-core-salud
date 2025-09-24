<?php

namespace App\Services\Tenant;

use App\Repositories\Tenant\Interfaces\IPatientRepository;

class PatientService
{
    private IPatientRepository $patientRepository;

    public function __construct(IPatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function getAllPatients()
    {
        return $this->patientRepository->all();
    }

    public function getPaginatedPatients(int $perPage = 15)
    {
        return $this->patientRepository->paginate($perPage);
    }
}