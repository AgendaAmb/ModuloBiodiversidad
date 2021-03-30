<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_plantas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urlImg');
            $table->unsignedBigInteger('foto_plantas_planta_id');

            $table->foreign('foto_plantas_planta_id')
            ->references('planta_id')
            ->on('plantas')
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
        Schema::dropIfExists('foto_plantas');
    }
}
