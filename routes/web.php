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


Route::post('/', 'UserController@login')->name('user.login1'); 
Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');


//para entrar con diferente perfil

Route::get('/administrador', 'PerfilController@administrador');
Route::get('/secretariaE', 'PerfilController@secretariaE');
Route::get('/secretariaC', 'PerfilController@secretariaC');
Route::get('/comite', 'PerfilController@comite');
Route::get('/egresado', 'PerfilController@egresado');


//rutas index  

Route::get('/users', 'UserController@index');
Route::get('/perfiles', 'PerfilController@index');
Route::get('/empresas', 'EmpresaController@index');
Route::get('/ofertaslaborales', 'OfertalaboralController@index');
Route::get('/experiencialaborales', 'ExperiencialaboralController@index');
Route::get('/publicaciones', 'PublicacionController@index');


//rutas generales

Route::resource('perfil','PerfilController');
Route::resource('usuario','UserController');
Route::resource('empresa','EmpresaController');
Route::resource('ofertalaboral','OfertalaboralController');
Route::resource('experiencialaboral','ExperiencialaboralController');
Route::resource('publicacion','PublicacionController');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// cancelaciones 
Route::get('cancelarPerfil', function () {
    return redirect()->route('perfil.index')->with('datos','Accion cancelada..!');
})->name('cancelarPerfil');  //le damos nombre a la ruta

Route::get('cancelarUsuario', function () {
    return redirect()->route('usuario.index')->with('datos','Accion cancelada..!');
})->name('cancelarUsuario');  //le damos nombre a la ruta
Route::get('cancelarEmpresa', function () {
    return redirect()->route('empresa.index')->with('datos','Accion cancelada..!');
})->name('cancelarEmpresa');  //le damos nombre a la ruta




//rutas usadas por javascript
Route::Get('/usuarioslista', 'UserController@usuarios');