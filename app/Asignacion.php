<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Asignacion extends Model implements Auditable
{
    protected $table="asignaciones";
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [

        'hora_inicio',
        'hora_fin',
        'fecha_inicio',
        'fecha_fin',
        'horas_duracion',
        'valor_curso',
        'observacion',        
        'estado',       
    ];

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
    public function facilitadores()
    {
        return $this->belongsToMany('App\Facilitador');
    }
    public function matriculas()
    {
        return $this->HasMany('App\Matricula');
    }
}

