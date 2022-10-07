<?php

namespace App\Enums;

class SupplierEnum
{
    const GENERAL = 0;
    const HOLE_SELLER = 1;

    public static function getText(int $item)
    {
        if(self::GENERAL == $item){
            return __('General');
        }

        if(self::HOLE_SELLER == $item){
            return __('Hole Seller');
        }
    }

}