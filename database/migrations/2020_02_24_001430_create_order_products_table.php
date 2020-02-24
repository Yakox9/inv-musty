<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigInteger('id_order')->unsigned();
            $table->bigInteger('id_product')->unsigned();
            $table->bigInteger('id_status');
            $table->bigInteger('quantity');
            $table->timestamps();

            $table->primary('id_order');
            $table->foreign('id_order')->references('id')->on('orders');
            $table->foreign('id_product')->references('id')->on('products');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
