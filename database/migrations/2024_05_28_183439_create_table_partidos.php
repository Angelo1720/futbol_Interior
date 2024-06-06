<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->integer('idEdicion');
            $table->string('fecha');
            $table->integer('nroJornada');
            $table->string('nombreJornada');
            $table->string('nomEquipoLocal');
            $table->string('nomEquipoVisitante');
            $table->jsonb('dataEquipoLocal')->nullable();
            $table->jsonb('dataEquipoVisitante')->nullable();
            $table->jsonb('goles')->nullable();

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
        Schema::dropIfExists('partidos');
    }
};
