<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name','color_code','status'];
}
