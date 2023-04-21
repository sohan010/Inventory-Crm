<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'product_category_id ','product_subcategory_id ','brand_id ','unit_id ','product_code','product_name','product_description','product_unit','purchase_price',
        'sale_price','quantity','barcode','feature','image','alert_qty','alert_message','sold_count','status'
    ];

    public function category() :BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function subcategory() :BelongsTo
    {
        return $this->belongsTo(PoductSubCategory::class, 'product_subcategory_id', 'id');
    }

    public function brand() :BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors() : BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    public function sizes() : BelongsToMany
    {
        return $this->belongsToMany(Size::class);
    }
}
