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
      $perfil=Perfil::where('perfil','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
      
   //  $user=perfil::where('estado','=',TRUE)->get();
      return  view('perfiles.index',compact('perfil','buscarpor'));  

  }

  public function edit($id)
  {
      $perfil=Perfil::findOrfail($id);
      
      return view('perfiles.edit',compact('perfil'));
  }
  
  public function update(Request $request, $id)
    {
        $data=request()->validate([
            'perfil'=>'required|max:50',
            'estado'=>'required|max:2'
        ],
        [
            'perfil.required'=>'Ingrese curso ',
             
            ]);
  
            $perfil=Perfil::findOrfail($id);    //instanciamos nuestro modelo perfil
            $perfil->perfil=$request->perfil;  //designamos el valor de descripcion
            $perfil->estado=$request->estado;  //designamos el valor de descripcion
            $perfil->save();  
            
            return redirect()->route('perfil.index')->with('datos','Registro Actualizado...!');    
    }

    public function administrador()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('inicioAdministrador');

    }

   
    public function secretariaE()
    {
       //return "eres un secretariaE... estas a cargo del sistema";
       return view('inicioSecretariaE');

    }

    public function secretariaC()
    {
       //return "eres un secretariaC... estas a cargo del sistema";
       return view('inicioSecretariaC');

    }

    public function comite()
    {
       //return "eres un comite... estas a cargo del sistema";
       return view('iniciocomite');

    }

    public function egresado()
    {
       //return "eres un egresado... estas a cargo del sistema";
       return view('inicioEgresado');

    }
}
