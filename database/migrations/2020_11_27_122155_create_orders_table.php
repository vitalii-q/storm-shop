<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(0);
            $table->integer('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('currency_id')->nullable();
            $table->double('sum')->nullable();
            $table->timestamps();

            $table->string('shipping_city');
            $table->string('shipping_street');
            $table->string('shipping_apartment');

            $table->string('message')->nullable();

            $table->enum('payment_method', ['cash_payment', 'payment_by_card', 'paypal'])->default('cash_payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
