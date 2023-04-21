<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualCart extends Model
{
    use HasFactory;

    protected $table = 'virtual_carts';
    protected $fillable = ['product_id','product_name','unit_price','quantity','total_price','status'];
}
