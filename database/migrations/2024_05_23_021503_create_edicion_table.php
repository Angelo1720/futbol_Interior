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
            $table->string('fechaInicio');
            $table->string('fechaFinal');
            $table->integer('idCampeon')->nullable();
            $table->boolean('liguilla')->default(false);
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