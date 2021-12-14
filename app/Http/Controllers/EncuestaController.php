<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Egresado;
use App\Models\Egreencuesta;
use App\Models\Encuesta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class EncuestaController extends Controller
{
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $encuesta=Encuesta::where('titulo','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('encuestas.index',compact('encuesta','buscarpor'));  
  
    }
    public function listaE( Request $request){

        $buscarpor=$request->get('buscarpor');
        $encuesta=Encuesta::where('titulo','like','%'.$buscarpor.'%')->where('estadoencuesta','=','publicada')->get();//->paginate($this::PAGINACION);  
        
        $egresado=Egresado::where('idusuario','=',Auth::user()->id)->get();
      
        $EgreE=Egreencuesta::where('estado','=','1')->get();
        $pregunta=Pregunta::where('estado','=','1')->get();//->paginate($this::PAGINACION);  
        $respuesta=Respuesta::where('estado','=','1')->get();
    

     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('encuestas.listaE',compact('encuesta','buscarpor','egresado','EgreE','pregunta','respuesta'));  
  
    }
    public function create()
    {
        
        return view('encuestas.create' );
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'titulo'=>'required',
            'tipo'=>'required',
            'fechapublicacion'=>'required'
            
        ],
        [
            'titulo.required'=>'Ingrese titulo ',
            'tipo.required'=>'Ingrese tipo ',
            'fechapublicacion.required'=>'Ingrese fechapublicacion ' 
             
            ]);
  
            $encuesta=new Encuesta();    //instanciamos nuestro modelo empresa
            $encuesta->titulo=$request->titulo;  //designamos el valor de descripcion
            $encuesta->tipo=$request->tipo;
            $encuesta->fechapublicacion=$request->fechapublicacion;
            $encuesta->estadoencuesta='registrada';
            $encuesta->estado=true;  //designamos el valor de descripcion
            $encuesta->save();  
            
            return redirect()->route('encuesta.index')->with('datos','Registro Guardado...!');    
           
    }

    public function edit($id)
  {
      $encuesta=Encuesta::findOrfail($id);
      
      return view('encuestas.edit',compact('encuesta'));
  }

  public function update(Request $request, $id)
    {
        $data=request()->validate([
            'titulo'=>'required',
            'tipo'=>'required',
            'fechapublicacion'=>'required'
            
        ],
        [
            'titulo.required'=>'Ingrese titulo ',
            'tipo.required'=>'Ingrese tipo ',
            'fechapublicacion.required'=>'Ingrese fecha publicacion ' 
             
            ]);
  
            $encuesta=  Encuesta::findOrfail($id);    //instanciamos nuestro modelo empresa
            $encuesta->titulo=$request->titulo;  //designamos el valor de descripcion
            $encuesta->tipo=$request->tipo;
            $encuesta->fechapublicacion=$request->fechapublicacion;
            $encuesta->estadoencuesta=$request->estadoencuesta;
            $encuesta->estado=$request->estado;  //designamos el valor de descripcion
            $encuesta->save();  

            return redirect()->route('encuesta.index')->with('datos','Registro Actualizado...!');    
    }

    public function destroy($id)
    {
        $encuesta=Encuesta::findOrFail($id);
        if ( ($encuesta->estadoencuesta) =='registrada') {
         $encuesta->estadoencuesta='publicada';
         $encuesta->fechapublicacion=  date("Y-m-d");
         $encuesta->save();
         return redirect()->route('encuesta.index')->with('datos','Encuesta Publicada...!');
            }
         elseif(($encuesta->estadoencuesta) =='publicada') {
         $encuesta->estadoencuesta='cerrada';
         $encuesta->save();
         return redirect()->route('encuesta.index')->with('datos','Encuesta Cerrada...!');
         }
         else{
        return redirect()->route('encuesta.index')->with('datos','la Encuesta ya esta Cerrada...!');
           
         }

        }
    

    public function estado($id)
    {
        $encuesta=Encuesta::findOrFail($id);
        if ( ($encuesta->estado) =='1') {
         $encuesta->estado='0';
         $encuesta->save();
         return redirect()->route('encuesta.index')->with('datos','encuesta Desactivada...!');
            }
         elseif(($encuesta->estado) =='0') {
         $encuesta->estado='1';
         $encuesta->save();
         return redirect()->route('encuesta.index')->with('datos','encuesta Activada...!');
         }

        }
}
