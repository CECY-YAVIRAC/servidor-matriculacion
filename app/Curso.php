<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Curso extends Model implements Auditable
{
    protected $table="cursos";
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        
        'codigo',       
        'nombre',
        'tipo',
        'modalidad',         
        'lugar',
        'lugar_otros', 
        'estado',        
    ]; 

    public function instituto()
    {
        return $this->belongsTo('App\Instituto');
    }

    public function asignaciones()
    {
        return $this->hasMany('App\Asignacion');
    }
       
}
