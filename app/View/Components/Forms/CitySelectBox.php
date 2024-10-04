<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CitySelectBox extends Component
{
    public function __construct(public string $regionSlug, public ?string $locationSlug = null)
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

        return view('components.forms.city-select-box', [
            'regionSlug' => $this->regionSlug,
            'locationSlug' => $this->locationSlug,
            'years' => $years
        ]);
    }
}
