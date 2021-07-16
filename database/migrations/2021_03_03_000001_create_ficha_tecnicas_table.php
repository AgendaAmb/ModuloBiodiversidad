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
            $table->string('TPertenencia',600);
            $table->string('Fcrecimiento',600);
            $table->string('Floracion',600);
            $table->string('Origen',600);
            $table->string('Descripcion',600);
            $table->string('EstatusEco',600);
            $table->string('EstatusConv',600);
            $table->string('Altura');
            $table->string('TipoC',600);
            $table->string('TipoR',600);
            $table->string('RaicesObs',600);
            $table->string('Usos',600);
            $table->string('Clima',600);
            $table->string('Porte',600);
            $table->string('SistemR',600);
            $table->string('RequerimientosE',600);
            $table->string('ServiciosAmb',600);
            $table->string('AmenazasRiesgos',600);
            $table->string('AmenazasRiesgosHab',600);
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
