<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNamEnglish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nombre_ejemplars', function (Blueprint $table) {
            $table->string('NombreComunIng2')->nullable()->after('NombreComun');
        });

        Schema::table('ficha_tecnicas', function (Blueprint $table) {
            $table->string('Url_PC21')->nullable()->after('Url_PC');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
