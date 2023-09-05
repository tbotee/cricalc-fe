<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Services\ApartmentStatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RegionStatisticsController extends Controller
{
    protected ApartmentStatisticsService $aSS;

    public function __construct(ApartmentStatisticsService $apartmentStatisticsService)
    {
        $this->aSS = $apartmentStatisticsService;
    }

    public function show(Request $request, string $regionSlug)
    {
        $region = Region::with('cities')
            ->where('slug', $regionSlug)
            ->first();

        $regionCityIds = $region->cities
            ->pluck('id')
            ->toArray();

        $lastStatisticalDate = $this->aSS->getLastStatisticalDate($regionCityIds);

        $isOldDate = Carbon::now()->format('Y-m') != $lastStatisticalDate->format('Y-m');

        $sortedCities = $region->cities->sortBy('name');

        $startDate = $lastStatisticalDate->copy()->startOfMonth()->format('Y-m-d');
        $endDate = $lastStatisticalDate->format('Y-m-d');

        return view('region-statistics', [
            'setSelectedRegion' => true,
            'regionSlug' => $regionSlug,
            'lastStatisticalDate' => $lastStatisticalDate,
            'statisticalData' => Cache::remember(
                $regionSlug . '_regions_' . $startDate . '-' . $endDate,
                $isOldDate ? null : 1440,
                function () use ($sortedCities, $startDate, $endDate) {
                    $statistics = ['aggregatedData' => []];
                    foreach ($sortedCities as $city) {
                        $res = array(
                            'city' => $city,
                            'one_room_count' => $this->aSS->getApartmentCount(
                                $startDate,
                                $endDate,
                                config('constants.category_mapping')[1],
                                $city->id
                            ),
                            'two_room_count' => $this->aSS->getApartmentCount(
                                $startDate,
                                $endDate,
                                config('constants.category_mapping')[2],
                                $city->id
                            ),
                            'three_room_count' => $this->aSS->getApartmentCount(
                                $startDate,
                                $endDate,
                                config('constants.category_mapping')[3],
                                $city->id
                            ),
                            'four_room_count' => $this->aSS->getApartmentCount(
                                $startDate,
                                $endDate,
                                config('constants.category_mapping')[4],
                                $city->id
                            )
                        );
                        $res['total_count'] = $res['one_room_count']->average_count +
                            $res['two_room_count']->average_count +
                            $res['three_room_count']->average_count +
                            $res['four_room_count']->average_count;
                        $statistics['aggregatedData'][] = $res;
                    }
                    return $statistics;
                }),
        ]);
    }
    public function show_by_room_number(Request $request, string $regionSlug)
    {
        return view('region-statistics');
    }
}
