<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tecnicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TPertenencia');
            $table->string('Fcrecimiento');
            $table->string('Floracion');
            $table->string('Origen');
            $table->string('Descripcion');
            $table->string('EstatusEco');
            $table->string('EstatusConv');
            $table->string('Altura');
            $table->string('TipoC');
            $table->string('TipoR');
            $table->string('RaicesObs');
            $table->string('Usos');
            $table->string('Clima');
            $table->string('Porte');
            $table->string('SistemR');
            $table->string('RequerimientosE');
            $table->string('ServiciosAmb');
            $table->string('AmenazasRiesgos');
            $table->string('AmenazasRiesgosHab');
            $table->string('Estado');
            $table->string('Url_PC');
            $table->string('Url_F');
            $table->string('Url_H');
            $table->string('Url_FL');
            $table->string('Url_FR');
            $table->string('Url_S');
            $table->string('Url_T');
            $table->string('Url_R');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_tecnicas');
    }
}
