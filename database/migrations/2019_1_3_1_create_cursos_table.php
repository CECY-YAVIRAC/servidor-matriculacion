<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('instituto_id');
            $table->foreign('instituto_id')->references('id')->on('institutos');         
            $table->string('codigo', 50)->nullable();
            $table->string('nombre', 200)->nullable();
            $table->string('tipo', 20)->default(0);
            $table->string('modalidad', 20)->default(0);        
            $table->string('lugar', 30)->default(0);
            $table->string('lugar_otros', 100)->nullable();              
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
        Schema::dropIfExists('cursos');
    }
}
