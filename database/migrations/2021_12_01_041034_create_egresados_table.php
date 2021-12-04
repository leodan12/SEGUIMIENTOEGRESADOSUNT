<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('carrera');
            $table->string('añoegreso');
            $table->string('numeropromocion');
            $table->boolean('estercio');
            $table->boolean('esquinto');
            $table->boolean('esbachiller');
            $table->boolean('estitulado');
            $table->boolean('estado')->default(true);
            $table->integer('idusuario')->nullable(); //Relacion egresado y usuario
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
        Schema::dropIfExists('egresados');
    }
}
