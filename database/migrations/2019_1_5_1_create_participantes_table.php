<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();         
            $table->string('identificacion', 50)->nullable();
            $table->string('apellido1', 50)->nullable();
            $table->string('apellido2', 50)->nullable();
            $table->string('nombre1', 50)->nullable();
            $table->string('nombre2', 50)->nullable();           
            $table->string('genero', 20)->default(0);
            $table->string('etnia', 20)->default(0);                                  
            $table->date('fecha_nacimiento')->nullable();         
            $table->string('estado', 20)->default('ACTIVO')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
}
