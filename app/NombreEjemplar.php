<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NombreEjemplar extends Model
{
    protected $table = 'nombre_ejemplars';

    protected $fillable=['NombreComun','NombreCientifico'];

    public function plantaNom()
    {
        return $this->hasMany(Planta::class);
    }
}
