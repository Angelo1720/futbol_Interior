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
            $table->integer('idEscudo');
            $table->integer('imgCancha');
            $table->dateTime('fechaFundacion');
            $table->string('nomCancha');
            $table->string('latitudCancha');
            $table->string('longitudCancha');
            $table->enum("divisional", Divisionales::forMigration());
            $table->integer('cantidadTitulos');
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
