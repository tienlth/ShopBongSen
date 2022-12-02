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
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sale')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->string('color')->nullable();
            $table->integer('expiry')->nullable();
            $table->string('main_image')->nullable();
            $table->string('meaning')->nullable();
            $table->string('taking_care_guide')->nullable();
            $table->boolean('designed_by_customer')->nullable();
            $table->string('sub_image1')->nullable();
            $table->string('sub_image2')->nullable();
            $table->string('sub_image3')->nullable();
            $table->integer('producttype_id')->nullable();
            $table->integer('style_id')->nullable();
            $table->integer('quality')->default(5);
            $table->integer('sold')->default(0);
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
