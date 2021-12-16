<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperiencialaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiencialaborals')->
        insert([
        'cargo'=>'SCRUM MASTER',
        'area'=>'TECNOLOGÍA DE INFORMACIÓN',
        'funciones'=>'Guiar el equipo de desarrollo',
        'fechainicio'=>'2020-10-01',
        'fechatermino'=>'2021-10-01',
        'modalidad'=>'presencial',
        'tipocontrato'=>'parcial',
        'idegresado'=>'1',
        'idempresa'=>'1',
        'estado'=>TRUE,
        ]);

        
        
        DB::table('experiencialaborals')->
        insert([
        'cargo'=>'PROGRAMADOR BACKEND',
        'area'=>'TECNOLOGÍA DE INFORMACIÓN',
       'funciones'=>'Programar backend',
       'fechainicio'=>'2020-10-01',
       'fechatermino'=>'2021-10-01',
       'modalidad'=>'presencial',
       'tipocontrato'=>'parcial',
       'idegresado'=>'2',
       'idempresa'=>'1',
       'estado'=>TRUE,
        ]);

       
    }
}
