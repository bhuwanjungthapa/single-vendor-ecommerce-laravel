<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id('product_attributes_id');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('products_id')->on('products');
            $table->unsignedBigInteger('attributes_id');
            $table->foreign('attributes_id')->references('attributes_id')->on('attributes');
            $table->integer('attribute_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
};
