<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\FichaTecnica;
use App\NombreEjemplar;
use Intervention\Image\ImageManager;

class ResibleImageP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $NombreEjemplar=NombreEjemplar::all();
      
       
        foreach ($NombreEjemplar as $Ejemplar) {
                if ($Ejemplar->ficha_tecnicas_id!=null) {
                    $InicialesEspecia = Str::of($Ejemplar->NombreComun)->replace(' ', '_');
                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_PC);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_PC_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_PC_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_PC_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_PC_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_PC_50.jpg', 50);
                    if ($Ejemplar->FichaTecnica->Url_PC2!=null) {
                        $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_PC2);
                        $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_PC2_10.jpg', 10);
                        $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_PC2_20.jpg', 20);
                        $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_PC2_30.jpg', 30);
                        $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_PC2_40.jpg', 40);
                        $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_PC2_50.jpg', 50);
                    }
                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_F);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_F_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_F_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_F_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_F_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_F_50.jpg', 50);

                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_H);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_H_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_H_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_H_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_H_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_H_50.jpg', 50);

                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_FL);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_FL_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_FL_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_FL_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_FL_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_FL_50.jpg', 50);

                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_FR);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_FR_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_FR_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_FR_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_FR_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_FR_50.jpg', 50);

                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_S);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_S_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_S_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_S_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_S_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_S_50.jpg', 50);

                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_T);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_T_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_T_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_T_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_T_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_T_50.jpg', 50);

                    $img = Image::make('public/storage/'.$Ejemplar->FichaTecnica->Url_R);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/10/'.$Ejemplar->Clave.'_R_10.jpg', 10);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/20/'.$Ejemplar->Clave.'_R_20.jpg', 20);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/30/'.$Ejemplar->Clave.'_R_30.jpg', 30);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/40/'.$Ejemplar->Clave.'_R_40.jpg', 40);
                    $img->save('public/storage/FichasTecnicas/'.$InicialesEspecia.'/50/'.$Ejemplar->Clave.'_R_50.jpg', 50);
                }
            }
            
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
