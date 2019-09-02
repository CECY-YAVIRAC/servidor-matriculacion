<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();           
            $table->integer('participante_id');
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->integer('asignacion_id');
            $table->foreign('asignacion_id')->references('id')->on('asignaciones');    
            $table->integer('tipo_matricula_id')->nullable();
            $table->foreign('tipo_matricula_id')->references('id')->on('tipo_matriculas'); 
            $table->integer('tipo_descuento_id')->nullable();
            $table->foreign('tipo_descuento_id')->references('id')->on('tipo_descuentos');           
            $table->string('codigo', 50)->nullable();
            $table->dateTime('fecha')->nullable(); 
            $table->string('paralelo', 20)->nullable();                   
            $table->string('numero_matricula', 20)->nullable();
            $table->string('estado_academico', 20)->nullable(); 
            $table->double('valor_total')->nullable(); 
            $table->double('nota')->nullable();     
            $table->string('carrera', 20)->nullable();
            $table->string('nivel', 20)->nullable();
            $table->string('condicion_academica', 20)->nullable();                      
            $table->string('direccion', 200)->nullable();
            $table->string('telefono_celular', 20)->nullable();
            $table->string('telefono_fijo', 20)->nullable();
            $table->string('correo_electronico', 100)->nullable();
            $table->string('instruccion_academica', 20)->nullable();
            $table->string('economicamente_activo', 20)->nullable();
            $table->string('empresa_trabajo', 50)->nullable();            
            $table->string('empresa_direccion', 100)->nullable();
            $table->string('correo_empresa', 100)->nullable();
            $table->string('telefono_empresa', 20)->nullable();
            $table->string('actividad_empresa', 100)->nullable();             
            $table->string('curso_auspicio', 20)->nullable();
            $table->string('nombre_contacto', 100)->nullable();
            $table->string('averiguo_curso', 20)->nullable();
            $table->string('cursos_seguir', 500)->nullable();
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
        Schema::dropIfExists('matriculas');
    }
}
