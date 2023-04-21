<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    protected $fillable = ['name','color_code','status'];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
