<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    
   public function index( Request $request){

      $buscarpor=$request->get('buscarpor');
      $perfil=Perfil::where('estado','=',TRUE)->where('perfil','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
      
   //  $user=perfil::where('estado','=',TRUE)->get();
      return  view('perfiles.index',compact('perfil','buscarpor'));  

  }
  
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
