<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->bigInteger('quantity');
            $table->double('subtotal');
            $table->string('discount_type')->nullable();
            $table->double('discount_amount')->nullable();
            $table->double('coupon_discount')->nullable();
            $table->double('vat_amount')->nullable();
            $table->double('shipping_amount')->nullable();
            $table->double('total_amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
