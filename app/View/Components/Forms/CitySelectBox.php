<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CitySelectBox extends Component
{
    public function __construct(public string $regionSlug)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.city-select-box', [
            'regionSlug' => $this->regionSlug
        ]);
    }
}
