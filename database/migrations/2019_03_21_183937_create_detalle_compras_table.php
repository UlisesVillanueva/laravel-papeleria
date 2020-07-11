<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('compra_id')->nullable();
            $table->double('precio_total');
            $table->unsignedInteger('producto_id')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('set null');
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
        Schema::dropIfExists('detalle_compras');
    }
}
