<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;
use App\Models\Pregunta;
use App\Models\Egresado;
use App\Models\Encuesta;
use App\Models\User;
use App\Models\Egreencuesta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class RespuestaController extends Controller
{
    
    public function listar( $id){
      
        $egresado=Egresado::where('idusuario','=',Auth::user()->id)->get();
        $encuesta=Encuesta::where('id','=',$id)->get();
        $EgreE=Egreencuesta::where('encuesta_id','=',$id)->where('egresado_id','=',$egresado[0]->id)->get();
        $pregunta=Pregunta::where('estado','=','1')->where('encuesta_id','=',$id)->get();//->paginate($this::PAGINACION);  
        $respuesta=Respuesta::where('estado','=','1')->get();
     //  $user=perfil::where('estado','=',TRUE)->get();
        return   view('preguntas.lista',compact('pregunta','encuesta','egresado','EgreE','respuesta'));  
  
    }

    public function crear($id)
    {
       $pregunta=Pregunta::where('id','=',$id)->get();
        
        return  view('respuestas.create' , compact('pregunta',));
    }

    public function edit($id)
    {
        $encuesta=Encuesta::findOrfail($id);
        $pregunta=DB::table('encuestas as e')
        ->join('preguntas as p','e.id','=','p.encuesta_id')
        ->where('e.id','=',$id)
        ->select('p.enunciado','e.titulo')->get();

        $respuesta=DB::table('encuestas as e')
        ->join('preguntas as p','e.id','=','p.encuesta_id')
        ->join('respuestas as r','p.id','=','r.pregunta_id')
        ->join('egreencuestas as ee','ee.id','=','r.egreencuesta_id')
        ->join('egresados as egre','egre.id','=','ee.egresado_id')
        ->where('e.id','=',$id)
        ->select('r.enunciado','e.titulo','egre.id')->get();
        
        $egresados=DB::table('egresados as e')
        ->select('e.id','e.nombres','e.apellidos')->get();
        
         
        
        return view('respuestas.index',compact('egresados','respuesta','encuesta','pregunta'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'enunciado'=>'required',
            'pregunta_id'=>'required'
           
            
        ],
        [
            'enunciado.required'=>'Ingrese enunciado ',
            'pregunta_id.required'=>'Ingrese pregunta_id '
            
             
            ]);
            $preguntas=Pregunta::where('id','=',$request->pregunta_id)->get();

            $egresados=Egresado::where('idusuario','=',Auth::user()->id)->get();
            $encuestas=Encuesta::where('id','=',$preguntas[0]->encuesta_id)->get();
            $EgreEs=Egreencuesta::where('estado','=','1')->get();
            
            $contE= 0;
            $idegreE = 0;
            foreach($EgreEs as $e){
                if($e->egresado_id == $egresados[0]->id && $e->encuesta_id == $encuestas[0]->id){
                    $contE = $contE + 1;
                }
            }

            if($contE == 0){
                $egreEs=new Egreencuesta();
                $egreEs->egresado_id=$egresados[0]->id;
                $egreEs->encuesta_id=$encuestas[0]->id;
                $egreEs->save();
            }

            $EgreEncuesta=Egreencuesta::where('estado','=','1')
            ->where('egresado_id','=',$egresados[0]->id)->where('encuesta_id','=',$encuestas[0]->id)->get();
             
            $respuestas=new Respuesta();    //instanciamos nuestro modelo empresa
            $respuestas->enunciado=$request->enunciado;  //designamos el valor de descripcion
            $respuestas->pregunta_id=$request->pregunta_id; 
            $respuestas->egreencuesta_id=$EgreEncuesta[0]->id;
            $respuestas->estado=true;  //designamos el valor de descripcion
            $respuestas->save(); 
            
            
            return redirect()->route('listarpreguntas',$preguntas[0]->encuesta_id )->with('datos','Registro Guardado...!');    
           
    }

}
