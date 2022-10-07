<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{

    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->bigInteger('image')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('city');
            $table->string('address');
            $table->string('nid');
            $table->string('company_name')->nullable();
            $table->integer('supplier_type')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
