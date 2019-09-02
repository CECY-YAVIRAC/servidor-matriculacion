<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Instituto extends Model implements Auditable
{
    protected $table="institutos";    
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'codigo',        
        'nombre',
        'estado',
    ]; 
    
    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
   
}
