<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_en');
            $table->string('code');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bottom')->nullable();
            $table->text('description_bottom_en')->nullable();
            $table->text('information')->nullable();
            $table->text('information_en')->nullable();
            $table->double('price')->default(0);
            $table->text('image_1')->nullable();
            $table->text('image_2')->nullable();
            $table->text('image_3')->nullable();
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
}
