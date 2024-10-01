<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class StringHelper
{
    public static function convertToSlug($text): string
    {
        $text = mb_strtolower($text);
        $text = str_replace(
            ['ă', 'â', 'î', 'ș', 'ț', 'î', 'ş'],
            ['a', 'a', 'i', 's', 't', 'i', 's'],
            $text
        );
        $text = preg_replace('/[^\w]+/', '-', $text);
        $text = trim($text, '-');
        $text = Str::ascii($text);
        $text = str_replace(' ', '-', $text);
        return preg_replace('/-+/', '-', $text);
    }

    public static function currentDateHumanFormat(Carbon $formattedDate): string
    {
        $monthNames = [
            'ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie',
            'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'
        ];
        $year = $formattedDate->format('Y');
        $month = $formattedDate->format('n');
        return $year . '-' . $monthNames[$month - 1];
    }

    public static function currentDateFormHumanFormat(string $dateSlug): Carbon
    {
        $monthNames = [
            'ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie',
            'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'
        ];
        list ($year, $month) = explode('-', $dateSlug);
        $index = array_search($month, $monthNames);
        return Carbon::createFromDate((int) $year, $index + 1, 1);
    }
}
