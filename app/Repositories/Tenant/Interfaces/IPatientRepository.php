<?php

namespace App\Repositories\Tenant\Interfaces;

use App\Http\DTOs\PatientData;

interface IPatientRepository
{
    public function all();
    public function paginate(int $perPage = 15);
    public function create(PatientData $data);
}