<?php

namespace App\Providers;

use App\Models\Region;
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
                return Region::with(['cities' => function ($query) {
                    $query->orderBy('name', 'asc');
                }])->orderBy('name', 'asc')->get();
            });
            $view->with('regions', $regions);
        });
    }
}
