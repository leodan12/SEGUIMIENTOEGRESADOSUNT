<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respuestas')->insert(['enunciado' => 'redes','pregunta_id'=>'1','egreencuesta_id'=>'1']);
        DB::table('respuestas')->insert(['enunciado' => 'si','pregunta_id'=>'2','egreencuesta_id'=>'1']);
        DB::table('respuestas')->insert(['enunciado' => 'si','pregunta_id'=>'3','egreencuesta_id'=>'1']);
      
        DB::table('respuestas')->insert(['enunciado' => 'desarrollo','pregunta_id'=>'1','egreencuesta_id'=>'2']);
        DB::table('respuestas')->insert(['enunciado' => 'si','pregunta_id'=>'2','egreencuesta_id'=>'2']);
        DB::table('respuestas')->insert(['enunciado' => 'no','pregunta_id'=>'3','egreencuesta_id'=>'2']);
      

    }
}
