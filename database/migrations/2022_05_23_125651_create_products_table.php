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
        Schema::create('products', function (Blueprint $table) {
            $table->id('products_id');
            $table->string('status');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('sub_category_id')->on('subcategories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('specification')->nullable();
            $table->string('description')->nullable();
            $table->integer('price')->nullable();
            $table->double('discount')->default('0');
            $table->integer('stock')->default('0');
            $table->integer('quantity')->default('0');
            $table->boolean('flash_key')->default('0');
            $table->boolean('hot_key')->default('0');
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
