<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionFacilitadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_facilitador', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('asignacion_id');
            $table->foreign('asignacion_id')->references('id')->on('asignaciones');
            $table->integer('facilitador_id');
            $table->foreign('facilitador_id')->references('id')->on('facilitadores');
            $table->string('estado', 20)->default('ACTIVO');

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_facilitador');
    }
}
