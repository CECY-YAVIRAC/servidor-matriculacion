<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitadores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('cedula', 50)->nullable();
            $table->string('apellido1', 50)->nullable();
            $table->string('apellido2', 50)->nullable();
            $table->string('nombre1', 50)->nullable();
            $table->string('nombre2', 50)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('correo_electronico', 100)->nullable();
            $table->string('capacitaciones', 100)->nullable();  
            $table->string('titulo', 100)->nullable();    
            $table->string('estado',20)->default('ACTIVO')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilitadores');
    }
}
