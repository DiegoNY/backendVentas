<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('id_laboratorio');
            $table->string('laboratorio');
            $table->string('tipo');
            $table->string('stock');
            $table->string('stock_minimo');
            $table->string('precio_compra');
            $table->string('precio_venta');
            $table->string('descuento');
            $table->string('venta_sujeta');
            $table->string('foto_producto');
            $table->string('estado');
            $table->string('estatus');
            $table->string('fecha_registro');
            $table->string('codigo_barras');
            $table->string('descuento');
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
        Schema::dropIfExists('productos');
    }
};
