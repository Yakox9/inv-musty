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
            $table->bigIncrements('id');
            $table->date('date');
            $table->date('delivery_date');
            $table->bigInteger('id_client')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_status')->unsigned();

            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_status')->references('id')->on('status');

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
