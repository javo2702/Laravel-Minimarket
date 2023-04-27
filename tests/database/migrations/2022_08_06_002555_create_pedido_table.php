<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('idPedido')->primary();
            $table->integer('idCliente');
            $table->integer('idComprobante');
            $table->integer('idMetodo');
            $table->decimal('montoTotal', 10, 2);
            $table->string('estadoPedido', 20);
            
            $table->foreign('idCliente', 'fk_Pedido_Cliente')->references('idCliente')->on('cliente');
            $table->foreign('idComprobante', 'fk_Pedido_Comprobante1')->references('idComprobante')->on('comprobante');
            $table->foreign('idMetodo', 'fk_Pedido_MetodoEntrega1')->references('idMetodo')->on('metodoentrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
