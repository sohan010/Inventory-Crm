<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductUserTable extends Migration
{

    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('color_id')->nullable();
            $table->unsignedSmallInteger('product_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('color_product');
    }
}
