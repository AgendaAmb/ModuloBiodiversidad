<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\NombreEjemplar;
use DB;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

      public function loadEjemplares()
    {
        $this->Ejemplar = NombreEjemplar::all();
        $this->SubUnidadTP = DB::table('sub_unidades')
            ->orderBy('NombreUnidad', 'asc')
            ->get();
    }
    public function loadSubUnidades()
    {
        $json = File::get("storage/TSubUnidades.json");
        $SubUnidad = json_decode($json);
        $this->SubUnidades = array();
        for ($i = 0; $i < count($SubUnidad); $i++) {
            $this->SubUnidades[] = array(
                "IdSubUnidad" => $SubUnidad[$i]->IdSubUnidad,
                "IdUnidad" => $SubUnidad[$i]->IdUnidad,
                "SubUnidad" => $SubUnidad[$i]->SubUnidad,
            );
        }
        foreach ($this->SubUnidades as $key => $row) {
            $aux[$key] = $row['SubUnidad'];
        }
        array_multisort($aux, SORT_ASC, $this->SubUnidades);
    }
}
