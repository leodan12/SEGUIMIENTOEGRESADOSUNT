<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Egresado;
use App\Models\Encuesta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class PreguntaController extends Controller
{
    public function listap( $id){

        $encuesta=Encuesta::where('id','=',$id)->get();
        $pregunta=Pregunta::where('estado','=','1')->where('encuesta_id','=',$id)->get();//->paginate($this::PAGINACION);  
        
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('preguntas.index',compact('pregunta','encuesta'));  
  
    }
    public function crear($id)
    {
       // $encuesta=Encuesta::findOrFail($id);
       $encuesta=Encuesta::where('id','=',$id)->get();
        return view('preguntas.create' , compact('encuesta'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'enunciado'=>'required',
            'encuesta_id'=>'required'
           
            
        ],
        [
            'enunciado.required'=>'Ingrese enunciado ',
            'encuesta_id.required'=>'Ingrese encuesta_id '
            
             
            ]);
            $encuesta=Encuesta::where('titulo','=',$request->encuesta_id)->get();

            $pregunta=new Pregunta();    //instanciamos nuestro modelo empresa
            $pregunta->enunciado=$request->enunciado;  //designamos el valor de descripcion
            $pregunta->encuesta_id=$encuesta[0]->id;
            $pregunta->estado=true;  //designamos el valor de descripcion
            
            $pregunta->save();  
            
            return redirect()->route('listapreguntas',$encuesta[0]->id)->with('datos','Registro Guardado...!');    
           
    }

    

}
