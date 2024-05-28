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
        Schema::create('edicion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fechaInicio')->nullable();
            $table->string('fechaFinal')->nullable();
            $table->integer('idCampeon')->nullable();
            $table->boolean('liguilla')->default(false);
            $table->integer('idCampeonato');
            $table->foreign('idCampeonato')->references('id')->on('campeonatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edicion');
    }
};