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
            $table->string('CondicionGeneral')->nullable();;
            $table->string('EstadoCrecimiento')->nullable();;
            $table->double('Altura')->nullable();;
            $table->double('AlturaLiteratura')->nullable();;
            $table->string('Tcopa')->nullable();;
            $table->double('DiametroCopa')->nullable();;
            $table->string('Raices')->nullable();;
            $table->string('TRaices')->nullable();;
            $table->string('Manejo')->nullable();;
            $table->string('DanosF')->nullable();
            $table->string('EstadoFiso')->nullable();;
            $table->string('EnfermeAparentes')->nullable();;
            $table->string('EnfermeLitera')->nullable();;
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
