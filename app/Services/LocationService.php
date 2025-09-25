<?php

namespace App\Services;

use App\Repositories\Interfaces\ICentralLocationRepository;

class LocationService
{
    protected ICentralLocationRepository $centralLocationRepository;

    public function __construct(ICentralLocationRepository $centralLocationRepository)
    {
        $this->centralLocationRepository = $centralLocationRepository;
    }

    public function getCommunities()
    {
        return $this->centralLocationRepository->getCommunities();
    }

    public function getProvinces($communityId)
    {
        return $this->centralLocationRepository->getProvinces($communityId);
    }

    public function getMunicipalities($provinceId)
    {
        return $this->centralLocationRepository->getMunicipalities($provinceId);
    }
}