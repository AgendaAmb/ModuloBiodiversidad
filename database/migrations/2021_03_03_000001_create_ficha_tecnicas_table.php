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
            $table->string('TPertenencia',500);
            $table->string('Fcrecimiento',500);
            $table->string('Floracion',500);
            $table->string('Origen',500);
            $table->string('Descripcion',500);
            $table->string('EstatusEco',500);
            $table->string('EstatusConv',500);
            $table->string('Altura');
            $table->string('TipoC',500);
            $table->string('TipoR',500);
            $table->string('RaicesObs',500);
            $table->string('Usos',500);
            $table->string('Clima',500);
            $table->string('Porte',500);
            $table->string('SistemR',500);
            $table->string('RequerimientosE',500);
            $table->string('ServiciosAmb',500);
            $table->string('AmenazasRiesgos',500);
            $table->string('AmenazasRiesgosHab',500);
            $table->string('Estado');
            $table->string('MotivoRechazo')->nullable();
            $table->string('NomVerificador')->nullable();
            $table->string('Url_PC');
            $table->string('Url_F');
            $table->string('Url_H');
            $table->string('Url_FL');
            $table->string('Url_FR');
            $table->string('Url_S');
            $table->string('Url_T');
            $table->string('Url_R');
            
            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
