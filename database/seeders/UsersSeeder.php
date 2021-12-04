<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'administrador','email' => 'administrador@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '1','is_admin' => TRUE,]);
        DB::table('users')->insert(['name' => 'secretariaE','email' => 'secretariaE@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '2','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'secretariaC','email' => 'secretariaC@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '3','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'comite','email' => 'comite@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '4','is_admin' => FALSE,]);
        DB::table('users')->insert(['name' => 'Leodan','email' => 'egresado@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '5','is_admin' => FALSE,]);
        //DB::table('users')->insert(['name' => 'Richard','email' => 'richardzz@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '5','is_admin' => FALSE,]);
        //DB::table('users')->insert(['name' => 'Roberto','email' => 'robert@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '5','is_admin' => FALSE,]);
        //DB::table('users')->insert(['name' => 'Leandro','email' => 'leandr@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '5','is_admin' => FALSE,]);
        //DB::table('users')->insert(['name' => 'Danny','email' => 'danny@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '5','is_admin' => FALSE,]);
        //DB::table('users')->insert(['name' => 'Brayan','email' => 'brayan@gmail.com', 'password' =>bcrypt('password') ,'perfils_id' => '5','is_admin' => FALSE,]);

    }
}
