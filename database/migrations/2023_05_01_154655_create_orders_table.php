<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->text('orderId')->nullable();
            $table->text('urlPay')->nullable();
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->integer('viloyat_id');
            $table->integer('tuman_id');
            $table->text('address');
            $table->text('point');
            $table->integer('pay_id');
            // $table->integer('payment_id')->nullable();
            // $table->string('oreder_pay_image')->nullable();
            $table->string('order_check')->nullable();
            $table->integer('order_summa')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
