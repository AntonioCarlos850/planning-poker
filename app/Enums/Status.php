<?php

namespace App\Enums;

enum Status: int
{
    case Show = 1;
    case Hide = 2;

    public function name()
    {
        return match ($this) {
            self::Show => __('Show'),
            self::Hide => __('Hide'),
        };
    }
}
