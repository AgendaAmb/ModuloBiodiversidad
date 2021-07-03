<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaTecnica extends Model
{
    protected $table = 'ficha_tecnicas';

    protected $fillable=['id',
    'TPertenencia',
    'Fcrecimiento',
    'Floracion',
    'Descripcion',
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
    'AmenazasRiesgosHab'
];
}
