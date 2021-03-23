<?php

use Illuminate\Database\Seeder;
use App\SubUnidades;
class SubUnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_unidades')->delete();
        $json = File::get("database/data/SubUnidadesPrincipales.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            SubUnidades::create(array(
                'IdUnidad' => $obj->IdUnidad,
                'NombreUnidad' => $obj->NombreUnidad,
                'Abreviatura'=>$obj->Abreviatura
            ));
        }
    }
}
