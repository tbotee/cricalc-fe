<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function welcome(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apartmentTypes = array_keys(config('constants.apartment_types'));
        return view('welcome', [ 'apartmentTypes' => $apartmentTypes ]);
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        $city = $request->input('city');
        $numberOfRooms = $request->input('numberOfRooms');

        $parameters = [
            'regionSlug' => $request->input('region'),
            'locationSlug' => $city ?? null,
            'numberOfRooms' => $numberOfRooms ?? null,
        ];

        $route = 'region.show';

        if ($city) {
            $route = ($numberOfRooms) ? 'location.show_by_room_number' : 'location.show';
        } elseif ($numberOfRooms) {
            $route = 'region.show_by_room_number';
        }

        return redirect()->route($route, $parameters);
    }
}
