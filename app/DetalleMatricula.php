<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DetalleMatricula extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'numero_matricula', 'paralelo', 'jornada', 'estado',
    ];

    public function matricula()
    {
        return $this->belongsTo('App\Matricula');
    }

    public function tipo_matricula()
    {
        return $this->belongsTo('App\TipoMatricula');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura');
    }
}
