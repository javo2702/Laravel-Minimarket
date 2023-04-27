<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedido', function (Blueprint $table) {
            $table->integer('idPedido');
            $table->integer('idProducto');
            $table->integer('cantidad');
            
            $table->primary(['idPedido', 'idProducto']);
            $table->foreign('idPedido', 'fk_Pedido_has_Producto_Pedido1')->references('idPedido')->on('pedido');
            $table->foreign('idProducto', 'fk_Pedido_has_Producto_Producto1')->references('idProducto')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepedido');
    }
}
