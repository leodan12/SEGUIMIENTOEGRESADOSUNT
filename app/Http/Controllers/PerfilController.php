<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    

    public function administrador()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('inicioAdministrador');

    }

   
    public function secretariaE()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('inicioSecretariaE');

    }

    public function secretariaC()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('inicioSecretariaC');

    }

    public function comite()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('iniciocomite');

    }

    public function egresado()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('inicioEgresado');

    }
}
