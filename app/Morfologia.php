<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Morfologia extends Model
{
    protected $table = 'morfologias';

    protected $fillable=['CondicionGeneral','EstadoCrecimiento','Altura','AlturaLiteratura','Tcopa',
    'DiametroCopa','Raices','TRaices','Manejo','DanosF','EstadoFiso','EnfermeAparentes','EnfermeLitera'
    ];

    public function PlantaMor()
    {
        return $this->belongsTo(Planta::class);
    }
    
}
