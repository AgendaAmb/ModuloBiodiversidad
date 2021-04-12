<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = 'plantas';

    protected $fillable=['FechaRecoleccion','NombreRecolectorDatos',
    'NombreRecolectorMuestra','Verificado','NomVerificador','urlImg',
    'imagenes','Morfologia_id','Nombre_Ejem_id','situacion_entornos_id'
    ];

    public function NombreEjem()
    {
        return $this->belongsTo(NombreEjemplar::class);
    }
    public function imagenesPlanta()
    {
        return $this->hasMany(FotoPlanta::class);
    }
    public function Morfologia()
    {
        return $this->hasOne(Morfologia::class);
    }
    public function SituacionEntorno()
    {
        return $this->hasOne(SituacionEntorno::class);
    }
}
