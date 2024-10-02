<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Region;
use App\Services\ApartmentStatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function __construct(public ApartmentStatisticsService $aSS)
    {
    }

    public function welcome()
    {
        $startDate = Carbon::now()->addMonths(-1)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        return view('welcome', [
            'banner_data' => $this->getStatisticsForHomeBanner($startDate, $endDate),
            'one_room_apartments' => $this->getStatisticsForXRooms(
                $startDate,
                $endDate,
                config('constants.apartment_types')['garzoniere']
            ),
            'two_room_apartments' => $this->getStatisticsForXRooms(
                $startDate,
                $endDate,
                config('constants.apartment_types')['2-camere']
            ),
            'three_room_apartments' => $this->getStatisticsForXRooms(
                $startDate,
                $endDate,
                config('constants.apartment_types')['3-camere']
            )
            ,
            'four_room_apartments' => $this->getStatisticsForXRooms(
                $startDate,
                $endDate,
                config('constants.apartment_types')['4-camere']
            )

        ]);
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        $city = $request->input('city');
        $numberOfRooms = $request->input('numberOfRooms');

        $parameters = [
            'regionSlug' => $request->input('region'),
            'locationSlug' => $city ?? null,
            'numberOfRooms' => $numberOfRooms ?? null
        ];

        $route = 'region.show';

        if ($city) {
            $route = ($numberOfRooms) ? 'location.show_by_room_number' : 'location.show';
        } elseif ($numberOfRooms) {
            $route = 'region.show_by_room_number';
        }

        return redirect()->route($route, $parameters);
    }

    private function getStatisticsForHomeBanner(Carbon $startDate, Carbon $endDate): \Illuminate\Support\Collection
    {
        return $this->aSS->getApartmentCountForRegion(
            $startDate,
            $endDate,
            [config('constants.category_mapping')[2]],
            config('constants.cities')
        )->groupBy('city_id')
            ->map(function ($group) {
                return $group->first();
            });
    }

    private function getStatisticsForXRooms(Carbon $startDate, Carbon $endDate, int $roomNumber)
    {
        $categoryId = config('constants.category_mapping')[$roomNumber];
        return $this->aSS->getCheapestCitiesForCategory($startDate, $endDate, $categoryId);
    }
}
