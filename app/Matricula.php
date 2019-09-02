<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Matricula extends Model implements Auditable
{
    protected $table="matriculas";
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [ 

       'codigo',
       'fecha',
       'paralelo',                 
       'numero_matricula',
       'estado_academico',
       'valor_total',
       'nota',       
       'carrera',
       'nivel',
       'condicion_academica',                 
       'direccion',
       'telefono_celular',
       'telefono_fijo',
       'correo_electronico',
       'instruccion_academica',
       'economicamente_activo',
       'empresa_trabajo',            
       'empresa_direccion',
       'correo_empresa',
       'telefono_empresa',
       'actividad_empresa',             
       'curso_auspicio',
       'nombre_contacto',
       'averiguo_curso',
       'cursos_seguir',
       'estado',
        
    ];

    public function tipo_matricula()
    {
        return $this->belongsTo('App\TipoMatricula');
    }

    public function participante()
    {
        return $this->belongsTo('App\Participante');
    }

    public function asignacion()
    {
        return $this->belongsTo('App\Asignacion');
    }

    public function tipo_descuento()
    {
        return $this->belongsTo('App\TipoDescuento');
    }   
}
