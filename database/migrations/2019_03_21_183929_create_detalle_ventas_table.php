<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('venta_id')->nullable();
            $table->double('precio_total');
            $table->unsignedInteger('producto_id')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('set null');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
