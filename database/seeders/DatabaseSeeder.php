<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PerfilsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(EmpresasSeeder::class);
        $this->call(OfertaslaboralesSeeder::class);
        $this->call(EgresadosSeeder::class);
        $this->call(ExperiencialaboralSeeder::class);
        $this->call(PublicacionSeeder::class);
    }
}
