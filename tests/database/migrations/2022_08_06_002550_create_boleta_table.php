<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta', function (Blueprint $table) {
            $table->integer('idComprobante')->primary();
            $table->string('tipoDocumento', 45);
            $table->string('numDocumento', 45);
            
            $table->foreign('idComprobante', 'fk_Boleta_Comprobante1')->references('idComprobante')->on('comprobante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boleta');
    }
}
