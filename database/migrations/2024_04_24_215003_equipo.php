<?php

use App\Enum\Divisionales;
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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->integer('idEscudo')->nullable();
            $table->integer('imgCancha')->nullable();
            $table->string('fechaFundacion');
            $table->string('nomCancha');
            $table->string('latitudCancha')->nullable();
            $table->string('longitudCancha')->nullable();
            $table->enum("divisional", Divisionales::forMigration());
            $table->integer('cantidadTitulos')->nullable();
        });
    }

    /**
     * Reverse the migrations.  
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};
