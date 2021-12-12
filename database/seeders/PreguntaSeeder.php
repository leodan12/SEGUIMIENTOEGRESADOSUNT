<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('preguntas')->insert(['enunciado' => '¿en que area tiene una especializacion?','encuesta_id'=>'1']);
        DB::table('preguntas')->insert(['enunciado' => '¿esta actualmente trabajando ?','encuesta_id'=>'1']);
        DB::table('preguntas')->insert(['enunciado' => '¿le es/fue dificial para encontrar trabajo?','encuesta_id'=>'1']);
        
        DB::table('preguntas')->insert(['enunciado' => '¿en que area se ha especializado?','encuesta_id'=>'2']);
        DB::table('preguntas')->insert(['enunciado' => '¿cuantos años lleva trabajando?','encuesta_id'=>'2']);
        DB::table('preguntas')->insert(['enunciado' => '¿cuantos empleos a tenido?','encuesta_id'=>'2']);
        
        DB::table('preguntas')->insert(['enunciado' => '¿en que area se ha especializado?','encuesta_id'=>'3']);
        DB::table('preguntas')->insert(['enunciado' => '¿al buscar trabajo tiene muchas opciones?','encuesta_id'=>'3']);
        
        

    }
}
