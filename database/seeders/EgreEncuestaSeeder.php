<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EgreEncuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('egreencuestas')->insert(['egresado_id'=>'1','encuesta_id'=>'1']);
        DB::table('egreencuestas')->insert(['egresado_id'=>'2','encuesta_id'=>'1']);
      
    }
}
