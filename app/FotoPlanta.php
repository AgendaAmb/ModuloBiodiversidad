<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPlanta extends Model
{
    protected $table = 'foto_plantas';

    protected $fillable=['FechaRecoleccion','NombreRecolectorDatos','NombreRecolectorMuestra','Verificado','NomVerificador'];

    public function Planta()
    {
        return $this->belongsTo(Planta::class);
    }
}
