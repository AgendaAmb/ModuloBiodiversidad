<?php

use Illuminate\Database\Seeder;
use App\NombreEjemplar;
use Illuminate\Support\Facades\Storage;
class NombreEjemplarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('nombre_ejemplars')->delete();
            $json = File::get("database/data/NombresEjemplares.json");
            $data = json_decode($json);
            foreach ($data as $obj) {
                NombreEjemplar::create(array(
                    'NombreComun' => $obj->Nombre,
                    'NombreCientifico' => $obj->NombreCientifico,
                    'Clave'=>$obj->Clave
                ));
            }

           
            
            }
}
