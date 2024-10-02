<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProductStatistic;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function show(Request $request)
    {
        return view('about-us', [
            'nr_of_cities' => City::count(),
            'nr_of_statistics' =>  number_format(ProductStatistic::count(), 0, ',', '.')
        ]);
    }
}
