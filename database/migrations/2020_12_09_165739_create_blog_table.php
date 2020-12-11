<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('code');
            $table->integer('user')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('preview_text');
            $table->text('preview_text_en')->nullable();
            $table->text('text');
            $table->text('text_en')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('blog');
    }
}
