<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = 'plantas';

    protected $fillable=['FechaRecoleccion','NombreRecolectorDatos',
    'NombreRecolectorMuestra','Verificado','NomVerificador','urlImg',
    'imagenes','Morfologia_id','nombre_ejem_id','situacion_entornos_id','MotivoRechazo'
    ];

    public function NombreEjem()
    {
        return $this->belongsTo(NombreEjemplar::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function imagenesPlanta()
    {
        return $this->hasMany(FotoPlanta::class);
    }
    public function Morfologia()
    {
        return $this->hasOne(Morfologia::class,'id');
    }
    public function SituacionEntorno()
    {
        return $this->hasOne(SituacionEntorno::class,'id');
    }
}
