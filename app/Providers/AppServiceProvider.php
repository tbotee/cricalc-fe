<?php

namespace App\Providers;

use App\Helpers\StringHelper;
use App\Models\Region;
use App\Services\ApartmentStatisticsService;
use App\View\Components\Forms\SearchBox;
use Carbon\Carbon;
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
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->addMonths(-1)->format('Y-m');

            $regions = Cache::remember('regions_with', null, function () {
                return Region::with(['cities' => function ($query) {
                    $query->select('id', 'slug', 'name', 'region_id');
                }])
                    ->select('id', 'slug', 'name')
                    ->orderBy('name', 'asc')
                    ->get();
            });
            $view->with('regions', $regions);
            $view->with('currentDate', $formattedDate);
            $view->with('currentDateHumanFormat', StringHelper::currentDateHumanFormat($currentDate));
            $view->with('categoryMapping', config('constants.category_mapping'));
        });
    }
}
