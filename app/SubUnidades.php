<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubUnidades extends Model
{
    protected $table = 'sub_unidades';

    protected $fillable=['IdUnidad','NombreUnidad','Abreviatura'];

   
}
