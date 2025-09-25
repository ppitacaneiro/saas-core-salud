<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocationService;

class LocationController extends Controller
{
    public function __construct(protected LocationService $locationService)
    {
    }

    public function communities()
    {
        return response()->json($this->locationService->getCommunities());
    }

    public function provinces(string $communityId)
    {
        return response()->json($this->locationService->getProvinces($communityId));
    }

    public function municipalities(string $provinceId)
    {
        return response()->json($this->locationService->getMunicipalities($provinceId));
    }
}
