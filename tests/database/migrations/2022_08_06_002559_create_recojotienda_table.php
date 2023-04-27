<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecojotiendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recojotienda', function (Blueprint $table) {
            $table->integer('idMetodo')->primary();
            $table->dateTime('fechaRecojo');
            
            $table->foreign('idMetodo', 'fk_RecojoTienda_MetodoEntrega1')->references('idMetodo')->on('metodoentrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recojotienda');
    }
}
