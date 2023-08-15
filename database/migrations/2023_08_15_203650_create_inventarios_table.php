<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     * Nombre del Producto	Categoría	
     * Proveedor	Cantidad	Unidad de Medida	
     * Precio Unitario	Precio Total	
     * Fecha de Ingreso	Fecha de Vencimiento
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre_Producto");
            $table->string("Categoria");
            $table->string("Cantidad");
            $table->String("Unidad_Medida");
            $table->integer("Precio_Unitario");
            $table->integer("Precio_Total");
            $table->date("Fecha_Ingreso");
            $table->date("Fecha_Vencimiento");
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
        Schema::dropIfExists('inventarios');
    }
}
