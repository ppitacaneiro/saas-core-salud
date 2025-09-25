<?php

namespace App\Repositories;

use App\Models\Province;
use App\Models\Community;
use App\Models\Municipality;
use App\Repositories\Interfaces\ICentralLocationRepository;

class CentralLocationRepository implements ICentralLocationRepository
{
    public function getCommunities()
    {
        return Community::all();
    }

    public function getProvinces($communityId)
    {
        return Province::where('community_id', $communityId)->get();
    }

    public function getMunicipalities($provinceId)
    {
        return Municipality::where('province_id', $provinceId)->get();
    }
}