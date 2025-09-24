<?php

namespace App\Repositories\Tenant;

use App\Models\Tenant\Patient;
use App\Repositories\Tenant\Interfaces\IPatientRepository;

class PatientRepository implements IPatientRepository
{
    public function query()
    {
        return Patient::query();
    }

    public function all()
    {
        return $this->query()->get();
    }

    public function paginate(int $perPage = 15)
    {
        $query = $this->query();

        return $query->paginate($perPage);
    }
}