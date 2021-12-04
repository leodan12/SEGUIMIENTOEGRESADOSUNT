<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EgresadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('egresados')->
        insert(['nombres' => 'Leodan',
        'apellidos'=>'Machuca Iparaguirre',
        'dni'=>'71101684',
        'carrera'=>'Ingeniería de Sistemas',
        'añoegreso'=>'2022',
        'numeropromocion'=>'XXIII', 
        'estercio'=>TRUE,
        'esquinto'=>FALSE,
        'esbachiller'=>TRUE,
        'estitulado'=>FALSE,
        'estado'=>TRUE,
        'idusuario'=>'5'
        ]);
/*
        DB::table('egresados')->
        insert(['nombres' => 'Richard Robert',
        'apellidos'=>'Braul Porras',
        'dni'=>'71101683',
        'carrera'=>'Ingeniería de Sistemas',
        'añoegreso'=>'2022',
        'numeropromocion'=>'XXIII', 
        'estercio'=>TRUE,
        'esquinto'=>FALSE,
        'esbachiller'=>TRUE,
        'estitulado'=>FALSE,
        'estado'=>TRUE,
        'idusuario'=>'6'
        ]);

        DB::table('egresados')->
        insert(['nombres' => 'Roberto',
        'apellidos'=>'Valdivia Ramos',
        'dni'=>'71101684',
        'carrera'=>'Ingeniería de Sistemas',
        'añoegreso'=>'2022',
        'numeropromocion'=>'XXIII', 
        'estercio'=>TRUE,
        'esquinto'=>FALSE,
        'esbachiller'=>TRUE,
        'estitulado'=>FALSE,
        'estado'=>TRUE,
        'idusuario'=>'7'
        ]);

        DB::table('egresados')->
        insert(['nombres' => 'Leandro Nahuel',
        'apellidos'=>'Villarroel Rodriguez',
        'dni'=>'71101682',
        'carrera'=>'Ingeniería de Sistemas',
        'añoegreso'=>'2022',
        'numeropromocion'=>'XXIII', 
        'estercio'=>TRUE,
        'esquinto'=>FALSE,
        'esbachiller'=>TRUE,
        'estitulado'=>FALSE,
        'estado'=>TRUE,
        'idusuario'=>'8'
        ]);
        
        DB::table('egresados')->
        insert(['nombres' => 'Daniel',
        'apellidos'=>'Ataucuri Ynfante',
        'dni'=>'71101686',
        'carrera'=>'Ingeniería de Sistemas',
        'añoegreso'=>'2022',
        'numeropromocion'=>'XXIII', 
        'estercio'=>TRUE,
        'esquinto'=>FALSE,
        'esbachiller'=>TRUE,
        'estitulado'=>FALSE,
        'estado'=>TRUE,
        'idusuario'=>'9'
        ]);


        DB::table('egresados')->
        insert(['nombres' => 'Brayan',
        'apellidos'=>'Campos Montero',
        'dni'=>'71101681',
        'carrera'=>'Ingeniería de Sistemas',
        'añoegreso'=>'2022',
        'numeropromocion'=>'XXIII', 
        'estercio'=>TRUE,
        'esquinto'=>FALSE,
        'esbachiller'=>TRUE,
        'estitulado'=>FALSE,
        'estado'=>TRUE,
        'idusuario'=>'10'
        ]);
*/

       
    }
}
