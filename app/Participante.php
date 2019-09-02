<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Participante extends Model implements Auditable
{
    protected $table="participantes";
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [

      'identificacion', 
       'apellido1', 
       'apellido2',
       'nombre1',
       'nombre2',          
       'genero',
       'etnia',                        
       'fecha_nacimiento',              
       'estado',
        
    ]; 
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
