<?php

namespace App\Providers;

use App\Models\Region;
use App\View\Components\Forms\SearchBox;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $regions = Cache::remember('regions_with', null, function () {
                return Region::select(['id', 'name', 'slug'])
                    ->with(['cities' => function ($query) {
                        $query->select('id', 'name', 'slug');
                        $query->orderBy('name', 'asc')
                            ->select(['id', 'name', 'slug']);
                    }])
                    ->select('id', 'name', 'slug')
                    ->orderBy('name', 'asc')->get();
            });
            $view->with('regions', $regions);
        });
    }
}
