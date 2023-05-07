<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    public static function convertToSlug($text): string
    {
        $text = mb_strtolower($text);
        $text = str_replace(
            ['ă', 'â', 'î', 'ș', 'ț', 'î'],
            ['a', 'a', 'i', 's', 't', 'i'],
            $text
        );
        $text = preg_replace('/[^\w]+/', '-', $text);
        $text = trim($text, '-');
        $text = Str::ascii($text);
        $text = str_replace(' ', '-', $text);
        return preg_replace('/-+/', '-', $text);
    }
}
