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
                        $statistics['aggregatedData'][] = array(
                            'city' => $city,
                            'statistics' => $this->aSS->getStatistics(array(
                                'groupBy' => 'month',
                                'city_id' => $city->id,
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                            ))
                        );
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
