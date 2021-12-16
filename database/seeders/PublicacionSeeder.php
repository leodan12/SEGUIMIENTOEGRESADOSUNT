<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publicacions')->
        insert(['titulo' => 'PublicacionRichard',
        'tematica'=>'BASE DE DATOS', 
        'edicion'=>'LUCHITO',
        'editorial'=>'LARRY',
        'isbn'=>'8995925',
        'ruta'=>'ruta', 
        'fechapublicacion'=>'2021-12-04',
        'idegresado'=>'1',
        'estado'=>TRUE,
        ]);

        DB::table('publicacions')->
        insert(['titulo' => 'PublicacionMachuca',
        'tematica'=>'BASE DE DATOS', 
        'edicion'=>'LUCHITO',
        'editorial'=>'LARRY',
        'isbn'=>'8995925',
        'ruta'=>'ruta', 
        'fechapublicacion'=>'2021-12-10',
        'idegresado'=>'2',
        'estado'=>TRUE,
        ]);
       
       
    }
}
