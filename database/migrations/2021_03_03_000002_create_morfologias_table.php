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
            $table->string('CondicionGeneral');
            $table->string('EstadoCrecimiento');
            $table->double('Altura');
            $table->double('AlturaLiteratura');
            $table->string('Tcopa');
            $table->double('DiametroCopa');
            $table->string('Raices');
            $table->string('TRaices');
            $table->string('Manejo');
            $table->string('DanosF')->nullable();
            $table->string('EstadoFiso');
            $table->string('EnfermeAparentes');
            $table->string('EnfermeLitera');
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
