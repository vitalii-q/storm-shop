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
            $table->string('text_top')->nullable();
            $table->string('text_top_en')->nullable();
            $table->string('text');
            $table->string('text_en')->nullable();
            $table->string('text_bottom')->nullable();
            $table->string('text_bottom_en')->nullable();
            $table->string('text_position')->default('text-left');
            $table->text('image')->nullable();

            $table->tinyInteger('button');
            $table->string('link')->nullable();

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
