<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CityListing extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection $statisticsData,
        public string $title
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.city-listing', [
            'statisticsData' => $this->statisticsData,
            'title' => $this->title
        ]);
    }
}
