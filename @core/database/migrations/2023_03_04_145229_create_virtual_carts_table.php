<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualCartsTable extends Migration
{

    public function up()
    {
        Schema::create('virtual_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->double('unit_price');
            $table->bigInteger('quantity')->default(1);
            $table->double('total_price');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('virtual_carts');
    }
}
