<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Facilitador extends Model implements Auditable
{
    protected $table="facilitadores";
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [

        'cedula',
        'apellido1',
        'apellido2',
        'nombre1',
        'nombre2',
        'fecha_nacimiento',
        'correo_electronico',
        'capacitaciones',  
        'titulo', 
        'estado',  
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
