<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNombreEjemplarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nombre_ejemplars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombreComun');
            $table->string('NombreComunIng')->nullable();
            $table->string('NombreCientifico')->nullable();
            $table->string('Clave');
            $table->unsignedBigInteger('ficha_tecnicas_id')->nullable();
            $table->timestamps();

            $table->foreign('ficha_tecnicas_id')
                ->references('id')
                ->on('ficha_tecnicas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nombre_ejemplars');
    }
}
