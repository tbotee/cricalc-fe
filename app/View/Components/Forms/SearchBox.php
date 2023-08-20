<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $showTitle = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $apartmentTypes = array_keys(config('constants.apartment_types'));
        return view('components.forms.search-box', [
            'apartmentTypes' => $apartmentTypes
        ]);
    }
}
