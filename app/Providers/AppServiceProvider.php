<?php

namespace App\Providers;

use App\Models\Region;
use App\Services\ApartmentStatisticsService;
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
        $this->app->bind(ApartmentStatisticsService::class, function ($app) {
            return new ApartmentStatisticsService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $regions = Cache::remember('regions_with', null, function () {
                return Region::with(['cities' => function ($query) {
                    $query->select('id', 'slug', 'name', 'region_id');
                }])
                    ->select('id', 'slug', 'name')
                    ->orderBy('name', 'asc')
                    ->get();
            });
            $view->with('regions', $regions);
        });
    }
}
