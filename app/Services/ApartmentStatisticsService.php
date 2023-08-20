<?php

namespace App\Services;
use App\Models\ProductStatistic;
use App\Models\Region;
use Carbon\Carbon;

class ApartmentStatisticsService
{

    public array $result = [];

    public function getStatistics(array $post): array
    {
        switch ($post['groupBy']) {
            case 'day':
                return $this->getReportByDay($post);
            case 'week':
                return $this->getReportByGroup($post, 'week');
            case 'month':
                return $this->getReportByGroup($post, 'month');
            case 'year':
                return $this->getReportByGroup($post, 'year');
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
}
