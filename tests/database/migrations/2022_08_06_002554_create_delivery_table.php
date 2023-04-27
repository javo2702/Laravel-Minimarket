<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->integer('idMetodo')->primary();
            $table->dateTime('fechaEntrega');
            $table->string('direccion', 45);
            
            $table->foreign('idMetodo', 'fk_Delivery_MetodoEntrega1')->references('idMetodo')->on('metodoentrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery');
    }
}
