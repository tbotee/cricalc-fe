<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function show(Request $request)
    {
        return view('about-us');
    }
}
