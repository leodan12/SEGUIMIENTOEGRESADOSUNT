<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfertaslaboralesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ofertalaborals')->insert(['titulo' => 'se nesecita desarrollor python','cargo'=>'desarrollador en lenguaje python', 'area'=>'desarrollo','descripcion'=>'desarrollo de aplicaciones web en django pyhton','disponibilidad'=>'tiempo completo','tipocontrato'=>'temporal', 'duracioncontrato'=>'6 meses','sueldo'=>'2500','funcion'=>'desarrollar las tareas asignadas','numerovacantes'=>'4','fechaemision'=>'2021-10-01','idempresa'=>'2',]);
        DB::table('ofertalaborals')->insert(['titulo' => 'se nesecita desarrollor php','cargo'=>'desarrollador en lenguaje php', 'area'=>'desarrollo','descripcion'=>'desarrollo de aplicaciones web en laravel php','disponibilidad'=>'tiempo completo','tipocontrato'=>'temporal', 'duracioncontrato'=>'6 meses','sueldo'=>'2500','funcion'=>'desarrollar las tareas asignadas','numerovacantes'=>'4','fechaemision'=>'2021-10-01','idempresa'=>'2',]);
       
        DB::table('ofertalaborals')->insert(['titulo' => 'se nesecita experto en redes','cargo'=>'diseñar modelos optimos de redes', 'area'=>'redes','descripcion'=>'diseño e implementacion de redes','disponibilidad'=>'tiempo parcial','tipocontrato'=>'medio tiempo', 'duracioncontrato'=>'12 meses','sueldo'=>'2000','funcion'=>'diseñar e implementar redes','numerovacantes'=>'2','fechaemision'=>'2021-10-01','idempresa'=>'1',]);
        DB::table('ofertalaborals')->insert(['titulo' => 'se nesecita experto en marketing','cargo'=>'crear los planes de marketing', 'area'=>'marketing','descripcion'=>'diseño e implementacion del plan de marketing','disponibilidad'=>'tiempo completo','tipocontrato'=>'temporal', 'duracioncontrato'=>'12 meses','sueldo'=>'3000','funcion'=>'diseñar e implementar los planes de marketing','numerovacantes'=>'1','fechaemision'=>'2021-10-01','idempresa'=>'1',]);
       
    }
}
