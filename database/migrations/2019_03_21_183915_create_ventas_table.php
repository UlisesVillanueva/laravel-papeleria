<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->date('fecha');
            $table->double('total_venta');
            $table->unsignedInteger('user_id')->nullable();



            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('ventas');
    }
}
