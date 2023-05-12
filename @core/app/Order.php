<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['customer_id','bill_date','payment_gateway','transaction_id','status','payment_status','manual_payment_attachment','cheque_number','cheque_payment_note'];

    public function order_details()
    {
       return $this->hasMany(OrderProduct::class,'order_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
