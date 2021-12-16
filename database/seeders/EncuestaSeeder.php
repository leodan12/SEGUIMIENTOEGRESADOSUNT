<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EncuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encuestas')->insert(['titulo' => 'mercado laboral para ing de sistemas','tipo'=>'mercado laboral', 'fechapublicacion'=>'2021-12-10',   'estadoencuesta'=>'publicada']);
        DB::table('encuestas')->insert(['titulo' => 'oferta laboral para ing de sistema','tipo'=>'mercado laboral', 'fechapublicacion'=>'2021-12-10',   'estadoencuesta'=>'publicada']);
        DB::table('encuestas')->insert(['titulo' => 'demanda laboral para ing de sistema','tipo'=>'mercado laboral', 'fechapublicacion'=>'2021-12-10', 'estadoencuesta'=>'registrada']);

       
        
    }
}
