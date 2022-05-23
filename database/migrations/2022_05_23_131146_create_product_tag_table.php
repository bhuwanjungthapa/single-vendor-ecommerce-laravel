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
        Schema::create('product_tag', function (Blueprint $table) {
            $table->id('product_tag_id');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->unsignedBigInteger('tags_id')->unsigned();
            $table->foreign('tags_id')->references('tags_id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('products_id')->unsigned();
            $table->foreign('products_id')->references('products_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_tag');
    }
};
