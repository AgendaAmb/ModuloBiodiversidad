<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliografia extends Model
{
    protected $table = 'bibliografias';

    public function FichasT()
    {
        return $this->belongsTo(FichaTecnica::class);
    }
}
