<?php

namespace App\Repositories\Tenant\Interfaces;

interface IPatientRepository
{
    public function all();
    public function paginate(int $perPage = 15);
}