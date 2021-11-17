<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert(['perfil' => 'administrador', ]);

        DB::table('perfils')->insert(['perfil' => 'secretariaE', ]);

        DB::table('perfils')->insert(['perfil' => 'secretariaC', ]);

        DB::table('perfils')->insert(['perfil' => 'comite', ]);

        DB::table('perfils')->insert(['perfil' => 'egresado', ]);

    }
}
