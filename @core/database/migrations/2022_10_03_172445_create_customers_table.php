<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{

    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->integer('customer_type')->default(0);
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('city');
            $table->string('address');
            $table->string('nid');
            $table->string('company_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
