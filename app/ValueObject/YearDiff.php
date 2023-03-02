<?php

namespace App\ValueObject;

use Carbon\Carbon;

class YearDiff
{
    public static function from(string $date): int
    {
        $dbDate = Carbon::parse($date);

        return Carbon::now()->diffInYears($dbDate);
    }
}
