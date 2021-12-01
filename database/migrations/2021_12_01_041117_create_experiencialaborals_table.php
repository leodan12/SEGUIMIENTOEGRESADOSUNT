<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencialaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencialaborals', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('cargo');
            $table->string('funciones');
            $table->date('fechainicio');
            $table->date('fechatermino');
            $table->string('modalidad');
            $table->string('tipocontrato');
            $table->integer('idegresado');
            $table->integer('idempresa');
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('experiencialaborals');
    }
}
