<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMorfologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morfologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CondicionGeneral',500)->nullable();
            $table->string('EstadoCrecimiento',500)->nullable();
            $table->double('Altura',500)->nullable();
            $table->double('AlturaLiteratura',500)->nullable();
            $table->string('Tcopa',500)->nullable();
            $table->double('DiametroCopa')->nullable();
            $table->string('Raices',500)->nullable();
            $table->string('TRaices',500)->nullable();
            $table->string('Manejo',500)->nullable();
            $table->string('DanosF',500)->nullable();
            $table->string('EstadoFiso',500)->nullable();
            $table->string('EnfermeAparentes',500)->nullable();
            $table->string('EnfermeLitera',500)->nullable();
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
        Schema::dropIfExists('morfologias');
    }
}
