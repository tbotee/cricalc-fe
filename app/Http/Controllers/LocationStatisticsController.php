<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\City;
use App\Services\ApartmentStatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationStatisticsController extends Controller
{
    public function __construct(public ApartmentStatisticsService $aSS)
    {
    }

    public function show(Request $request, string $locationSlug, string $regionSlug)
    {
        $city = City::where('slug', $locationSlug)->first();

        $date = Carbon::now()->startOfMonth()->addMonths(-1);
        $cityStatistics = $this->aSS->getCityStatisticsForCitiesWithCategories(
            $date,
            $date->copy()->endOfMonth(),
            config('constants.category_mapping'),
            [$city->id]
        );

        $allStatistics = $this->getAllStatisticsForACity($date, $city);

        return view('location-statistics', [
            'regionSlug' => $regionSlug,
            'locationSlug' => $locationSlug,
            'setSelectedRegion' => true,
            'city' => $city,
            'currentStatistics' => $cityStatistics,
            'allStatistics' => $allStatistics
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

    private function getAllStatisticsForACity(Carbon $date, $city): array
    {
        $result = [];
        $statistics = $this->aSS->getCityStatisticsForCitiesWithCategories(
            Carbon::create(1970, 1, 1),
            $date->copy()->addDays(-1),
            config('constants.category_mapping'),
            [$city->id],
            ['created_at', 'DESC']
        );
        $categoryIds = array_values(config('constants.category_mapping'));

        $groupedStatistics = $statistics->groupBy('created_at');
        foreach ($groupedStatistics as $date => $items) {
            $carbonDate = Carbon::parse($date);
            $entry = [$carbonDate->year . ' ' . StringHelper::getHumanMonthFromDate(Carbon::parse($carbonDate))];
            foreach ($categoryIds as $categoryId) {
                $item = $items->firstWhere('category_id', $categoryId);
                if ($item) {
                    $entry[] = [
                        'category_id' => $item->category_id,
                        'count' => $item->count,
                        'average_price' => $item->average_price,
                    ];
                } else {
                    $entry[] = '';
                }
            }
            $result[] = $entry;
        }
        return $result;
    }
}
