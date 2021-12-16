<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Egresado;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class PublicacionController extends Controller
{
    public function index( Request $request){

        $idUsuario=Auth()->user()->id;
        $buscarpor=$request->get('buscarpor');
        $pub=DB::table('publicacions as p')
        ->join('egresados as e','e.id','=','p.idegresado')
        ->join('users as u','u.id','=','e.idusuario')
        ->where('p.estado','=','1')
        ->where('u.id','=',$idUsuario)
        ->where('p.titulo','LIKE','%'.$buscarpor.'%')
        ->select('p.id','p.titulo','p.tematica','p.edicion','p.editorial','p.isbn','p.ruta','p.fechapublicacion','p.estado')->get();
        
        return  view('publicacion.index',compact('pub','buscarpor'));  
  
    }

    public function create()
    {
        $idUsuario=Auth()->user()->id;
        $egresado=DB::table('egresados as e','e.estado','=','1')
        ->join('users as u','u.id','=','e.idusuario')
        ->where('u.id','=',$idUsuario)
        ->select('e.id','e.nombres','e.apellidos')->get();
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
            $pub->estado=$request->estado;
            $pub->save();  
            
            return redirect()->route('publicacion.index')->with('datos','Registro Guardado...!');    
           
    }


    public function edit($id)
  {
      $idUsuario=Auth()->user()->id;
      $egresado=DB::table('egresados as e','e.estado','=','1')
      ->join('users as u','u.id','=','e.idusuario')
      ->where('u.id','=',$idUsuario)
      ->select('e.id','e.nombres','e.apellidos')->get();
      $pub=Publicacion::findOrfail($id);
      
      return view('publicacion.edit',compact('pub','egresado'));
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
                $pub->estado=$request->estado;
                $pub->save();  
                
                return redirect()->route('publicacion.index')->with('datos','Registro Actualizado...!');    
             
    }


  

  public function destroy($id)
  {
    $pub=Publicacion::findOrFail($id);
    $pub->estado='0';
    $pub->save();
    return redirect()->route('publicacion.index')->with('datos','Publicación Eliminada...!');
        
      }
}
