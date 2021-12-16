<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertalaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertalaborals', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('cargo');
            $table->string('area');
            $table->string('descripcion');
            $table->string('disponibilidad');
            $table->string('tipocontrato');
            $table->string('duracioncontrato');
            $table->integer('sueldo');
            $table->string('funcion');
            $table->integer('numerovacantes');
            $table->date('fechaemision');
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
        Schema::dropIfExists('ofertalaborals');
    }
}
