<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = 'plantas';

    protected $fillable=['FechaRecoleccion','NombreRecolectorDatos','NombreRecolectorMuestra','Verificado','NomVerificador'];

    public function NombreEjem()
    {
        return $this->belongsTo(NombreEjemplar::class);
    }
}
