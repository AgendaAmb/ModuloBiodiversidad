<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituacionEntornosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacion_entornos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Latitud')->nullable();
            $table->string('Altitud')->nullable();
            $table->string('TArea',500)->nullable();
            $table->string('Aspecto',500)->nullable();
            $table->json('Interfencia',500)->nullable();
            $table->string('No_Ejemplar')->nullable();
            $table->integer('EntidadAcademica')->nullable();
            $table->string('SubEntidadAcademica')->nullable();
           

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
        Schema::dropIfExists('situacion_entornos');
    }
}
