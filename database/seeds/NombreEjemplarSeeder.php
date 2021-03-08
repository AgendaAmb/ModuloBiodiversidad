<?php

use Illuminate\Database\Seeder;
use App\NombreEjemplar;

class NombreEjemplarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Acacia amarilla";
            $NombreEjem->Clave="AM";
            $NombreEjem->save();
            
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Acacia de tres espinas";
            $NombreEjem->Clave="ATE";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Acacia negra";
            $NombreEjem->Clave="AN";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Aceituno";
            $NombreEjem->Clave="ACE";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Acezintle";
            $NombreEjem->Clave="AEZ";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Aguacate";
            $NombreEjem->Clave="AG";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Ahuehuete";
            $NombreEjem->Clave="AH";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Aile";
            $NombreEjem->Clave="AILE";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Álamo blanco";
            $NombreEjem->Clave="AB";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Álamo blanco";
            $NombreEjem->Clave="AB";
            $NombreEjem->save();

            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Álamo blanco";
            $NombreEjem->Clave="AB";
            $NombreEjem->save();
              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Álamo canadiense";
            $NombreEjem->Clave="AC";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Algarrobo";
            $NombreEjem->Clave="ABO";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Aligustre";
            $NombreEjem->Clave="AL";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Almendro de la India";
            $NombreEjem->Clave="AI";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Anacahuita";
            $NombreEjem->Clave="AHA";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Aralia";
            $NombreEjem->Clave="ARA";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Araucaria";
            $NombreEjem->Clave="AR";
            $NombreEjem->save();

              
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun="Árbol de cebo";
            $NombreEjem->Clave="ACEB";
            $NombreEjem->save();
    }
}
