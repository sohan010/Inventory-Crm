<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoductSubCategory extends Model
{
    use HasFactory;

    protected $table = 'product_subcategories';
    protected $fillable = ['product_category_id','name','status'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
}
