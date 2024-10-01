<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Region;
use App\Services\ApartmentStatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegionStatisticsController extends Controller
{

    public function __construct(public ApartmentStatisticsService $aSS)
    {
    }

    public function showByDate(string $regionSlug, string $date)
    {
        $region = $this->getRegion($regionSlug);
        $startDate = StringHelper::currentDateFormHumanFormat($date);
        list($result, $total) = $this->getRegionData($startDate, $region->cities->pluck('id')->toArray());

        return view('region-statistics', [
            'data' => $result,
            'total' => $total,
            'regionSlug' => $regionSlug,
            'dateYear' => explode('-', $date)[0],
            'dateMonth' => explode('-', $date)[1],
            'region' => $region,
            'categoryMapping' => config('constants.category_mapping')
        ]);
    }
    public function show_by_room_number(Request $request, string $regionSlug)
    {
        return view('region-statistics');
    }

    private function getRegionData(Carbon $startDate, array $sortedCities): array
    {
        $regionData = $this->aSS->getApartmentCountForRegion(
            $startDate,
            $startDate->copy()->endOfMonth(),
            config('constants.category_mapping'),
            $sortedCities
        );

        $result = [];
        $total = 0;
        foreach ($regionData as $data) {
            if (!array_key_exists('city-' . $data->city->id, $result)) {
                $result['city-' . $data->city->id] = [
                    'items' => [],
                    'total' => 0,
                    'citySlug' => $data->city->slug,
                    'cityName' => $data->city->name,
                ];
            }
            $result['city-' . $data->city->id]['items'][] = $data;
            $result['city-' . $data->city->id]['total'] += $data->count;
        }
        $resultArray = array_values($result);
        usort($resultArray, function($a, $b) {
            return $b['total'] <=> $a['total'];
        });

        $result = [];
        foreach ($resultArray as $cityData) {
            $result['city-' . $cityData['citySlug']] = $cityData;
        }

        return array($result, $total);
    }

    private function getRegion(string $regionSlug): Region
    {
        return Region::with('cities')
            ->where('slug', $regionSlug)
            ->first();
    }
}
