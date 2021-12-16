<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert(['razonsocial' => 'tecnologia computacional SAC ','mision'=>'llegar a ser la mejor empresa en el peru', 'direccion'=>'av los manzanos nro 435','telefono'=>'948563184','email'=>'tecnologiascompt@gmail.com','web'=>'tecnologias.com.pe', ]);

        DB::table('empresas')->insert(['razonsocial' => 'desarrollo agil SAC ','mision'=>'llegar a ser la empresa numero 1 en el peru', 'direccion'=>'av los laureles nro 216','telefono'=>'976319584','email'=>'desarrolloagil@gmail.com','web'=>'desarrolloagil.com.pe', ]);
         
    }
}
