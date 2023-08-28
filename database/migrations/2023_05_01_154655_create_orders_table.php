<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.operationState
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('orderId')->nullable();
            $table->text('operation_id')->nullable();
            $table->text('operationState')->nullable();
            $table->text('operationType')->nullable();
            $table->text('urlPay')->nullable();
            $table->text('urlCheck')->nullable();
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->integer('viloyat_id');
            $table->integer('tuman_id');
            $table->text('address');
            $table->text('point');
            $table->integer('pay_id');
            $table->string('order_check')->nullable();
            $table->integer('order_summa')->nullable();
            $table->double('rate_uzs')->nullable();
            $table->integer('send_order')->nullable();
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
