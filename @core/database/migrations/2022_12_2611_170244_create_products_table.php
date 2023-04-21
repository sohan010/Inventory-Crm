<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_category_id');
            $table->bigInteger('product_subcategory_id');
            $table->bigInteger('brand_id');
            $table->bigInteger('unit_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->longText('product_description');
            $table->string('product_unit');
            $table->double('purchase_price');
            $table->double('sale_price');
            $table->integer('quantity');
            $table->string('barcode')->nullable();
            $table->string('feature')->nullable();
            $table->bigInteger('image')->nullable();
            $table->bigInteger('alert_qty')->nullable();
            $table->text('alert_message')->nullable();
            $table->bigInteger('sold_count');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->dropConstrainedForeignId('product_category_id')->references('id')->on('product_categories')->cascadeOnDelete();
            $table->dropConstrainedForeignId('product_subcategory_id')->references('id')->on('product_subcategories')->cascadeOnDelete();
            $table->dropConstrainedForeignId('brand_id')->references('id')->on('brands')->cascadeOnDelete();
            $table->dropConstrainedForeignId('unit_id')->references('id')->on('units')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
