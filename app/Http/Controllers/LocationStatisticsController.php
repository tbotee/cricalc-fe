<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationStatisticsController extends Controller
{
    public function show(Request $request, string $regionSlug, string $locationSlug)
    {
        return view('location-statistics');
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
