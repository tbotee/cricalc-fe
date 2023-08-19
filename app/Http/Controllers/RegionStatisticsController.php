<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionStatisticsController extends Controller
{
    public function show(Request $request, string $regionSlug)
    {
        return view('region-statistics');
    }
}
