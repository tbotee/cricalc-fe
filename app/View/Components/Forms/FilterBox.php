<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterBox  extends Component
{

    public function __construct(public string $date)
    {
    }

    public function render(): View
    {
        $currentYear = date('Y');
        $startYear = 2022;
        $years = [];

        for ($year = $startYear; $year <= $currentYear; $year++) {
            $years[] = $year;
        }

        return view('components.forms.filter-box', [
            'years' => $years
        ]);
    }
}
