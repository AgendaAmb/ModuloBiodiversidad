<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FechaRecoleccion');
            $table->string('NombreRecolectorDatos');
            $table->string('NombreRecolectorMuestra');
            $table->boolean('Verificado');
            $table->string('NomVerificador')->nullable();

            $table->unsignedBigInteger('Nombre_Ejem_id');

            $table->foreign('Nombre_Ejem_id')
            ->references('id')
            ->on('nombre_ejemplars')
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
        Schema::dropIfExists('plantas');
    }
}
