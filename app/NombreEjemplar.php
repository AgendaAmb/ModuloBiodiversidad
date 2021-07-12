<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NombreEjemplar extends Model
{
    protected $table = 'nombre_ejemplars';

    protected $fillable=['NombreComun','NombreCientifico','Clave','ficha_tecnicas_id'];

    public function plantaNom()
    {
        return $this->hasMany(Planta::class,'nombre_ejem_id');
    }
    public function FichaTecnica()
    {
        return $this->hasOne(FichaTecnica::class,'id');
    }
}
