<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaTecnica extends Model
{
    protected $table = 'ficha_tecnicas';

    protected $fillable = ['id',
        'TPertenencia',
        'Fcrecimiento',
        'Floracion',
        'Descripcion',
        'Origen',
        'EstatusEco',
        'EstatusConv',
        'Altura',
        'TipoC',
        'TipoR',
        'RaicesObs',
        'Usos',
        'Clima',
        'Porte',
        'SistemR',
        'RequerimientosE',
        'ServiciosAmb',
        'AmenazasRiesgos',
        'AmenazasRiesgosHab',
    ];
    public function NombreEjemplar()
    {
        return $this->belongsTo(NombreEjemplar::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
