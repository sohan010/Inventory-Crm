<?php

namespace App\Enums;

class ProductEnum
{
    const GENERAL = 0;
    const OTHER = 1;

    public static function getText(int $item)
    {
        if(self::GENERAL == $item){
            return __('General');
        }

        if(self::OTHER == $item){
            return __('Feature');
        }
    }

}