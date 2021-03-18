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
            $table->id();
            $table->string('Latitud');
            $table->string('Altitud');
            $table->string('TArea');
            $table->string('Aspecto');
            $table->string('Interfencia');
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
