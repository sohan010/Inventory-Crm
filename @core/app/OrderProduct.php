<?php

namespace App;

use App\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $fillable = [
        'order_id',
        'product_id',
        'single_quantity',
        'total_quantity',
        'subtotal',
        'discount_type',
        'discount_percentage',
        'discount_amount',
        'coupon_discount_type',
        'coupon_percentage',
        'coupon_discount',
        'vat_percentage',
        'vat_amount',
        'shipping_amount',
        'payable_amount',
        'due_amount',
        'total_amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }


}

