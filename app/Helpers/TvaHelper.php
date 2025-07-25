<?php

namespace App\Helpers;

use Carbon\Carbon;

class TvaHelper
{
    public static function getTvaRate(): int
    {
        $switchDate = Carbon::create(2025, 8, 1, 0, 0, 0);
        return now()->lt($switchDate) ? 19 : 21;
    }

    public static function getPriceWithTvaRate(): int
    {
        return 100 + self::getTvaRate();
    }

    public static function getTvaMultiplier(): float
    {
        return self::getTvaRate() / 100;
    }

    public static function getPriceWithTvaMultiplier(): float
    {
        return 1 + self::getTvaMultiplier();
    }
}
