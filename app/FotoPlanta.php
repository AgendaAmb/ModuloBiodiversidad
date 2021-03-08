<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPlanta extends Model
{
    protected $table = 'foto_plantas';

    protected $fillable=['urlImg'];

    public function Planta()
    {
        return $this->belongsTo(Planta::class);
    }
}
