<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre');
            $table->string('marca');
            $table->string('descripcion');
            $table->double('precio');
            $table->integer('cantidad');
            $table->unsignedInteger('unidad_id')->nullable();
            $table->string('imagen');
            $table->unsignedInteger('proveedor_id')->nullable();
            

            $table->foreign('unidad_id')->references('id')->on('unidads')->onDelete('set null');
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('set null');

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
}
