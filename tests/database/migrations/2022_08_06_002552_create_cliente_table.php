<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('idCliente')->primary();
            $table->string('nomCliente', 45);
            $table->string('apPatCliente', 45);
            $table->string('apMatCliente', 45);
            $table->string('telefono', 9);
            $table->string('email', 45);
            $table->string('direccion', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
