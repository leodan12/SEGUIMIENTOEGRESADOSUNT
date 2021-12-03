<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EgresadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('egresados')->insert(['nombres' => 'richard robert ','apellidos'=>'braul porras', 'dni'=>'45632187','carrera'=>'ing de sistemas','añoegreso'=>'2021','numeropromocion'=>'23','estercio'=>true, 'esquinto'=>false,'esbachiller'=>true, 'estitulado'=>false,'idusuario'=>'6',]);
     
        DB::table('egresados')->insert(['nombres' => 'leodan ','apellidos'=>'machuca iparraguirre', 'dni'=>'75655421','carrera'=>'ing de sistemas','añoegreso'=>'2021','numeropromocion'=>'23','estercio'=>true, 'esquinto'=>false,'esbachiller'=>true, 'estitulado'=>false,'idusuario'=>'7',]);
     
    }
}
