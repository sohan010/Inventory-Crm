<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('bill_date');
            $table->string('payment_gateway');
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('manual_payment_attachment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
