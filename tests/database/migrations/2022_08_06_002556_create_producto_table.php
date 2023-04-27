<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->integer('idProducto')->primary();
            $table->integer('idCategoria');
            $table->string('nomProducto', 60);
            $table->decimal('precio', 10, 2);
            $table->string('descProducto');
            $table->integer('stock');
            $table->string('imagen', 45)->nullable();
            $table->decimal('descuentoProducto', 4, 2)->nullable();
            
            $table->foreign('idCategoria', 'fk_Producto_Categoria1')->references('idCategoria')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
