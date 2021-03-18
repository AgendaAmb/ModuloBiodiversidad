<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacionEntorno extends Model

{
    protected $table = 'situacion_entornos';
    protected $fillable=['Latitud',
    'Altitud',
    'TArea',
    'Aspecto',
    'Interfencia'
    ];
    public function PlantaSituacionEntorno()
    {
        
        return $this->belongsTo(Planta::class);
    }
}
