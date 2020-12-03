<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_slider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text_top');
            $table->string('text_top_en');
            $table->string('text');
            $table->string('text_en');
            $table->string('text_bottom');
            $table->string('text_bottom_en');
            $table->string('text_position');
            $table->text('image')->nullable();
            $table->string('button');
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
        Schema::dropIfExists('main_slider');
    }
}
