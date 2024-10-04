<?php

namespace App\Services;
use App\Models\ProductStatistic;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApartmentStatisticsService
{

    public array $result = [];

    public function getStatistics(array $post): array
    {
        if ($post['groupBy'] === 'day') {
            return $this->getReportByDay($post);
        } else {
            return $this->getReportByGroup($post, $post['groupBy']);
        }
    }

    private function getReportByDay(array $post): array
    {
        $products = $this->getProductStatistics($post);
        return $this->generateReport($products);
    }

    private function generateReport($productsStatistics): array
    {
        $report = [];
        foreach ($productsStatistics as $statistic) {
            $report[] = (object) [
                'date' => $statistic->created_at->format('Y-m-d'),
                'realAverage' => $statistic->average_price,
                'totalAverage' => $statistic->average_price_with_outliners,
                'totalCount' => $statistic->count
            ];
        }
        return $report;
    }

    private function getReportByGroup(array $post, string $groupBy): array
    {
        $res = [];
        $byDay = $this->getReportByDay($post);
        foreach ($byDay as $day) {
            $weekStartDate = $this->getGroupByDate($day, $groupBy);
            if (array_key_exists($weekStartDate, $res)) {
                $res[$weekStartDate]->realAverage = $res[$weekStartDate]->realAverage + $day->realAverage;
                $res[$weekStartDate]->totalAverage = $res[$weekStartDate]->totalAverage + $day->totalAverage;
                $res[$weekStartDate]->totalCount = $res[$weekStartDate]->totalCount + $day->totalCount;
                $res[$weekStartDate]->recordCount = $res[$weekStartDate]->recordCount + 1;
            } else {
                $day->date = $weekStartDate;
                $day->recordCount = 1;
                $res[$weekStartDate] = $day;
            }
        }

        $average = [];

        foreach ($res as $week) {
            $week->realAverage = intval($week->realAverage / $week->recordCount);
            $week->totalAverage = intval($week->totalAverage / $week->recordCount);
            $week->totalCount = intval($week->totalCount / $week->recordCount);
            $average[] = $week;
        }

        return $average;
    }

    private function getGroupByDate($day, string $groupBy): string
    {
        switch ($groupBy) {
            case "week":
                return (new Carbon($day->date))->startOfWeek()->format('Y-m-d');
            case "month":
                return (new Carbon($day->date))->startOfMonth()->format('Y F');
            case "year":
                return (new Carbon($day->date))->startOfYear()->format('Y');
        }
        return (new Carbon($day->date))->format('Y-m-d');
    }

    public static function getProductStatistics(array $post) {
        return ProductStatistic::where('city_id', $post['city_id'])
            ->when(isset($post['rooms']), function($q) use ($post) {
                $q->where('category_id', config('constants.category_mapping')[$post['rooms']]);
            })
            ->when(isset($post['startDate']), function ($q) use ($post) {
                return $q->where('created_at', '>=', new Carbon($post['startDate']));
            })
            ->when(isset($post['endDate']), function ($q) use ($post) {
                return $q->where('created_at', '<=', new Carbon($post['endDate']));
            })
            ->get();
    }

    public function getLastStatisticalDate(array $cityIds, int $category = 0): Carbon
    {
        $product = (new ProductStatistic)->select('created_at')
            ->whereIn('city_id', $cityIds)
            ->when($category, function($q) use ($category) {
                $q->where('category_id', config('constants.category_mapping')[$category]);
            })
            ->orderBy('created_at', 'DESC')
            ->first();
        return $product->created_at;
    }

    public function getApartmentCount(string $startDate, string $endDate, int $category, int $cityId)
    {
        return ProductStatistic::select(
            DB::raw('CEIL(AVG(`count`)) as average_count'),
            DB::raw('CEIL(AVG(`average_price_with_outliners`)) as av_price'),
        )
            ->where('created_at', '>=', new Carbon($startDate))
            ->where('created_at', '<=', new Carbon($endDate))
            ->where('category_id', $category)
            ->where('city_id', $cityId)
            ->first();
    }

    public function getCityStatisticsForCitiesWithCategories(
        Carbon $startDate,
        Carbon $endDate,
        array $categoryIds,
        array $cityIds,
        array $orderBy = []
    ): \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|array {
        return ProductStatistic::where('created_at', '>=', $startDate->format('Y-m-d'))
            ->where('created_at', '<=', $endDate->format('Y-m-d'))
            ->with('city', 'city.region')
            ->whereIn('category_id', $categoryIds)
            ->whereIn('city_id', $cityIds)
            ->when($orderBy, function($query) use ($orderBy) {
                return $query->orderBy($orderBy[0], $orderBy[1]);
            })
            ->get();
    }

    public function getCheapestCitiesForCategory(Carbon $startDate, Carbon $endDate, int $categoryId)
    {
        return ProductStatistic::where('created_at', '>=', $startDate->format('Y-m-d'))
            ->where('created_at', '<=', $endDate->format('Y-m-d'))
            ->where('category_id', $categoryId)
            ->with('city', 'city.region')
            ->orderBy('average_price', 'ASC')
            ->limit(3)
            ->get();
    }

    public function getHistoryLinks(Carbon $startDate, array $cityIds, array $categoryIds)
    {
        return ProductStatistic::where('created_at', '<=', $startDate->endOfMonth()->format('Y-m-d'))
            ->select(
                DB::raw('MAX(created_at) as created_at'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as formated_created_at')
            )
            ->whereIn('category_id', $categoryIds)
            ->whereIn('city_id', $cityIds)
            ->groupBy('formated_created_at')
            ->orderBy('formated_created_at', 'DESC')
            ->limit(6)
            ->get();

    }
}
