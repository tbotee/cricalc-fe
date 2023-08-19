<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function welcome(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('welcome');
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route(
            'region.show',
            [ $request->input('region'), $request->input('city') ]
        );
    }
}
