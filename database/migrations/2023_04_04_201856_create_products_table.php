<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            // $table->uuid('product_id');
            $table->integer('category_id');
            $table->integer('tree_id');
            $table->string('product_name');
            $table->string('flavor');
            $table->text('description_product');
            $table->text('instruction_product');
            $table->double('price');
            $table->double('volume');
            $table->integer('count_products');
            $table->json('images_product')->nullable();
            // $table->string('images_product')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * product_table:

     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
