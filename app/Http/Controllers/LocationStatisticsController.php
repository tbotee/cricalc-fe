<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\ApartmentStatisticsService;
use Illuminate\Http\Request;

class LocationStatisticsController extends Controller
{
    public function __construct(public ApartmentStatisticsService $aSS)
    {
    }

    public function show(Request $request, string $locationSlug, string $regionSlug)
    {
        $city = City::where('slug', $locationSlug)->first();

        $lastStatisticalDate = $this->aSS->getLastStatisticalDate([$city->id]);


        return view('location-statistics', [
            'regionSlug' => $regionSlug,
            'locationSlug' => $locationSlug,
            'lastStatisticalDate' => $lastStatisticalDate,
            'setSelectedRegion' => true,
        ]);
    }

    public function show_by_room_number(
        Request $request,
        string $regionSlug,
        string $locationSlug,
        string $numberOfRooms
    ) {
        return view('location-statistics');
    }
}
