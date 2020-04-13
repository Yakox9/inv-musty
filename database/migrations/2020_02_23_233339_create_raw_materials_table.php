<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->unique();
            $table->bigInteger('id_status')->unsigned();
            $table->bigInteger('id_type_raw_materials')->unsigned();
            $table->bigInteger('id_provider')->unsigned();


            $table->foreign('id_type_raw_materials')->references('id')->on('type_raw_materials');
            $table->foreign('id_status')->references('id')->on('status');
            $table->foreign('id_provider')->references('id')->on('providers');
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
        Schema::dropIfExists('raw_materials');
    }
}
