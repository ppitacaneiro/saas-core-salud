<?php

namespace App\Repositories\Interfaces;

interface ICentralLocationRepository
{
    public function getCommunities();

    public function getProvinces($communityId);

    public function getMunicipalities($provinceId);
}