<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->integer('idComprobante')->primary();
            $table->string('numeroRuc', 45);
            $table->string('direccion', 45);
            $table->string('nombre_RazonSocial', 45);
            
            $table->foreign('idComprobante', 'fk_Factura_Comprobante1')->references('idComprobante')->on('comprobante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
