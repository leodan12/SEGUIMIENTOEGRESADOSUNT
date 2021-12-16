<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $empresa=Empresa::where('razonsocial','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('empresas.index',compact('empresa','buscarpor'));  
  
    }
    public function create()
    {
        
        return view('empresas.create' );
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'razonsocial'=>'required',
            'mision'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'web'=>'required',
            'estado'=>'required'
        ],
        [
            'razonsocial.required'=>'Ingrese razon social ',
            'mision.required'=>'Ingrese mision ',
            'direccion.required'=>'Ingrese direccion ',
            'telefono.required'=>'Ingrese telefono ',
            'email.required'=>'Ingrese email ',
            'web.required'=>'Ingrese web ',
            'estado.required'=>'Ingrese estado '
             
            ]);
  
            $empresa=new Empresa();    //instanciamos nuestro modelo empresa
            $empresa->razonsocial=$request->razonsocial;  //designamos el valor de descripcion
            $empresa->mision=$request->mision;
            $empresa->direccion=$request->direccion;
            $empresa->telefono=$request->telefono;
            $empresa->email=$request->email;
            $empresa->web=$request->web;
            $empresa->estado=$request->estado;  //designamos el valor de descripcion
            $empresa->save();  
            
            return redirect()->route('empresa.index')->with('datos','Registro Guardado...!');    
           
    }

    public function edit($id)
  {
      $empresa=Empresa::findOrfail($id);
      
      return view('empresas.edit',compact('empresa'));
  }

  public function update(Request $request, $id)
    {
        $data=request()->validate([
            'razonsocial'=>'required',
            'mision'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'web'=>'required',
            'estado'=>'required'
        ],
        [
            'razonsocial.required'=>'Ingrese razon social ',
            'mision.required'=>'Ingrese mision ',
            'direccion.required'=>'Ingrese direccion ',
            'telefono.required'=>'Ingrese telefono ',
            'email.required'=>'Ingrese email ',
            'web.required'=>'Ingrese web ',
            'estado.required'=>'Ingrese estado '
             
            ]);
  
            $empresa=Empresa::findOrfail($id);    //instanciamos nuestro modelo empresa
            $empresa->razonsocial=$request->razonsocial;  //designamos el valor de descripcion
            $empresa->mision=$request->mision;
            $empresa->direccion=$request->direccion;
            $empresa->telefono=$request->telefono;
            $empresa->email=$request->email;
            $empresa->web=$request->web;
            $empresa->estado=$request->estado;  //designamos el valor de descripcion
            $empresa->save();  
            
            return redirect()->route('empresa.index')->with('datos','Registro Actualizado...!');    
    }



    public function destroy($id)
    {
        $empresa=Empresa::findOrFail($id);
        if ( ($empresa->estado) =='1') {
         $empresa->estado='0';
         $empresa->save();
         return redirect()->route('empresa.index')->with('datos','Empresa Desactivado...!');
            }
         elseif(($empresa->estado) =='0') {
         $empresa->estado='1';
         $empresa->save();
         return redirect()->route('empresa.index')->with('datos','Empresa Activado...!');
         }

        }
}
