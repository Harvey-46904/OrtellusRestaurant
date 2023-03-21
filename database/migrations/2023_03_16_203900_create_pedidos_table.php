<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_pedido");
            $table->date("fecha_pedido");
            $table->string("precio");
            $table->string("descuento");
            $table->string("envio");
            $table->string("tipo_pago");
            $table->string("estado");
            $table->string("direccion");
            $table->integer("telefono");
            $table->string("descripcion");

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
        Schema::dropIfExists('pedidos');
    }
}
