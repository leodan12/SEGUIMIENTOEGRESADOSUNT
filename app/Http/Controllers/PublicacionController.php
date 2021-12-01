<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class PublicacionController extends Controller
{
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $pub=Publicacion::where('titulo','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('publicacion.index',compact('pub','buscarpor'));  
  
    }

    public function create()
    {
        $egresado=Egresado::all();
        return view('publicacion.create' ,compact('egresado'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'titulo'=>'required',
            'tematica'=>'required',
            'edicion'=>'required',
            'editorial'=>'required',
            'isbn'=>'required',
            'ruta'=>'required',
            'fechapublicacion'=>'required',
            'idegresado'=>'required',
            'estado'=>'required',
        ],
        [
            'titulo.required'=>'Ingrese titulo ',
            'tematica.required'=>'Ingrese tematica ',
            'edicion.equired'=>'Ingrese edicion ',
            'editorial.required'=>'Ingrese editorial ',
            'isbn.required'=>'Ingrese isbn',
            'ruta.required'=>'Ingrese ruta ',
            'fechapublicacion.required'=>'Ingrese fechapublicacion ',
            'idegresado.required'=>'Ingrese el egresado ',
            'estado.required'=>'Ingrese el estado',
            ]);
  
            $pub=new Publicacion();    //instanciamos nuestro modelo oferta laboral
            $pub->titulo=$request->titulo;  //designamos el valor de descripcion
            $pub->tematica=$request->tematica;
            $pub->edicion=$request->edicion;
            $pub->editorial=$request->editorial;
            $pub->isbn=$request->isbn;
            $pub->ruta=$request->ruta;
            $pub->fechapublicacion=$request->fechapublicacion;
            $pub->idegresado=$request->idegresado;
            $expLab->estado=$request->estado;
            $expLab->save();  
            
            return redirect()->route('publicacion.index')->with('datos','Registro Guardado...!');    
           
    }


    public function edit($id)
  {
      $egresado=egresado::all();
      $pub=Publicacion::findOrfail($id);
      
      return view('ofertaslaborales.edit',compact('pub','egresado'));
  }


  
  public function update(Request $request, $id)
    {
          $data=request()->validate([
                'titulo'=>'required',
                'tematica'=>'required',
                'edicion'=>'required',
                'editorial'=>'required',
                'isbn'=>'required',
                'ruta'=>'required',
                'fechapublicacion'=>'required',
                'idegresado'=>'required',
                'estado'=>'required',
            ],
            [
                'titulo.required'=>'Ingrese titulo ',
                'tematica.required'=>'Ingrese tematica ',
                'edicion.equired'=>'Ingrese edicion ',
                'editorial.required'=>'Ingrese editorial ',
                'isbn.required'=>'Ingrese isbn',
                'ruta.required'=>'Ingrese ruta ',
                'fechapublicacion.required'=>'Ingrese fechapublicacion ',
                'idegresado.required'=>'Ingrese el egresado ',
                'estado.required'=>'Ingrese el estado',
                 
                ]);
      
                $pub= Publicacion::findOrfail($id);       //instanciamos nuestro modelo oferta laboral
                $pub->titulo=$request->titulo;  //designamos el valor de descripcion
                $pub->tematica=$request->tematica;
                $pub->edicion=$request->edicion;
                $pub->editorial=$request->editorial;
                $pub->isbn=$request->isbn;
                $pub->ruta=$request->ruta;
                $pub->fechapublicacion=$request->fechapublicacion;
                $pub->idegresado=$request->idegresado;
                $expLab->estado=$request->estado;
                $expLab->save();  
                
                return redirect()->route('publicacion.index')->with('datos','Registro Actualizado...!');    
             
    }


  

  public function destroy($id)
  {
      $pub=Publicacion::findOrFail($id);
      if ( ($pub->estado) =='1') {
       $pub->estado='0';
       $pub->save();
       return redirect()->route('publicacion.index')->with('datos','Publicación Desactivada...!');
          }
       elseif(($pub->estado) =='0') {
       $pub->estado='1';
       $pub->save();
       return redirect()->route('publicacion.index')->with('datos','Publicación Activada...!');
       }

      }
}
