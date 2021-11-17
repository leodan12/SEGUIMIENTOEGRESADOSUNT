<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//para loguearse

Route::post('/', 'UserController@login')->name('user.login'); 
Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');


//para entrar con diferente perfil

Route::get('/administrador', 'PerfilController@administrador');
Route::get('/secretariaE', 'PerfilController@secretariaE');
Route::get('/secretariaC', 'PerfilController@secretariaC');
Route::get('/comite', 'PerfilController@comite');
Route::get('/egresado', 'PerfilController@egresado');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
