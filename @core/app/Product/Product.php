<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_category_id ','product_subcategory_id ','brand_id ','unit_id ','product_code','product_name','product_description','product_unit','purchase_price',
        'sale_price','quantity','barcode','feature','image','alert_qty','alert_message','sold_count','status'
    ];
}
