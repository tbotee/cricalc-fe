<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Support\Facades\DB;


class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::select(DB::raw('date, COUNT(id) as visitor_count, SUM(navigation_count) as total_navigation_count'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        return view('visitors.index', ['visitors' => $visitors]);
    }
}
