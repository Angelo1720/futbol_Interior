<?php

use App\Enum\Posiciones;
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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->integer('idEquipo')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('fechaNacimiento');
            $table->enum("posicion", Posiciones::forMigration());
            $table->integer('goles')->default('0');
            $table->integer('partidosJugados')->default('0');

            $table->foreign('idEquipo')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
};
