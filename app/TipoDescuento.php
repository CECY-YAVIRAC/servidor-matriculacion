<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TipoDescuento extends Model implements Auditable
{
    protected $table="tipo_descuentos";
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'descripcion',
        'valor_descuento',
        'estado',
    ];

    public function matriculas()
    {
        return $this->hasMany('App\Matricula');
    }    
    
}
