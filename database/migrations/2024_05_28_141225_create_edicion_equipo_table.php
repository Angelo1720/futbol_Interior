<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicion_equipo', function (Blueprint $table) {
            $table->integer('idEquipo');
            $table->integer('idEdicion');

            $table->foreign('idEquipo')->references('id')->on('equipos');
            $table->foreign('idEdicion')->references('id')->on('edicion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edicion_equipo');
    }
};