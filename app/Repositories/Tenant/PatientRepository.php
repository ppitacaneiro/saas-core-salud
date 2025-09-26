<?php

namespace App\Repositories\Tenant;

use App\Http\DTOs\PatientData;
use App\Models\Tenant\Patient;
use App\Repositories\Tenant\Interfaces\IPatientRepository;

class PatientRepository implements IPatientRepository
{
    public function query()
    {
        return Patient::with('allergies','medications')->newQuery();
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

    public function create(PatientData $data)
    {
        return Patient::create($data->toArray());
    }
}