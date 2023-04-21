<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Size extends Model
{

    protected $fillable = ['name','size_code','status'];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
