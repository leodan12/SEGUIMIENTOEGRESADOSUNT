<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experiencialaboral;
use App\Models\Empresa;
use App\Models\Egresado;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
class ExperiencialaboralController extends Controller
{
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $idUsuario=Auth()->user()->id;
        $expLab=DB::table('experiencialaborals as el')
        ->join('egresados as e','e.id','=','el.idegresado')
        ->join('users as u','u.id','=','e.idusuario')
        ->join('empresas as em','em.id','=','el.idempresa')
        ->where('el.estado','=','1')
        ->where('u.id','=',$idUsuario)
        ->where('el.area','like','%'.$buscarpor.'%')
        ->select('el.id','el.estado','el.area','el.cargo','el.funciones','el.fechainicio','el.fechatermino','el.modalidad','el.tipocontrato','em.razonsocial')->get();
        return  view('experiencialaboral.index',compact('expLab','buscarpor'));  
  
    }

    public function create()
    {
        $idUsuario=Auth()->user()->id;
        $empresa=Empresa::all();
        $egresado=DB::table('egresados as e','e.estado','=','1')
        ->join('users as u','u.id','=','e.idusuario')
        ->where('u.id','=',$idUsuario)
        ->select('e.id','e.nombres','e.apellidos')->get();

        return view('experiencialaboral.create' ,compact('empresa','egresado'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'area'=>'required',
            'cargo'=>'required',
            'funciones'=>'required',
            'fechainicio'=>'required',
            'fechatermino'=>'required',
            'modalidad'=>'required',
            'tipocontrato'=>'required',
            'idegresado'=>'required',
            'idempresa'=>'required',
            'estado'=>'required',
        ],
        [
            'area.required'=>'Ingrese area ',
            'cargo.required'=>'Ingrese cargo ',
            'funciones.equired'=>'Ingrese funciones ',
            'fechainicio.required'=>'Ingrese fecha de inicio ',
            'fechatermino.required'=>'Ingrese fecha de término ',
            'modalidad.required'=>'Ingrese modalidad ',
            'tipocontrato.required'=>'Ingrese tipocontrato ',
            'idegresado.required'=>'Ingrese el egresado ',
            'idempresa.required'=>'Ingrese la empresa ',
            'estado.required'=>'Ingrese el estado',
            ]);
  
            $expLab=new Experiencialaboral();    //instanciamos nuestro modelo oferta laboral
            $expLab->area=$request->area;  //designamos el valor de descripcion
            $expLab->cargo=$request->cargo;
            $expLab->funciones=$request->funciones;
            $expLab->fechainicio=$request->fechainicio;
            $expLab->fechatermino=$request->fechatermino;
            $expLab->modalidad=$request->modalidad;
            $expLab->tipocontrato=$request->tipocontrato;
            $expLab->idegresado=$request->idegresado;
            $expLab->idempresa=$request->idempresa;
            $expLab->estado=$request->estado;
            $expLab->save();  
            
            return redirect()->route('experiencialaboral.index')->with('datos','Registro Guardado...!');    
           
    }


    public function edit($id)
  {
      $idUsuario=Auth()->user()->id;
      $empresa=Empresa::all();
      $egresado=DB::table('egresados as e','e.estado','=','1')
      ->join('users as u','u.id','=','e.idusuario')
      ->where('u.id','=',$idUsuario)
      ->select('e.id','e.nombres','e.apellidos')->get();
      $expLab=Experiencialaboral::findOrfail($id);
      
      return view('experiencialaboral.edit',compact('empresa','egresado','expLab'));
  }


  
  public function update(Request $request, $id)
    {
          $data=request()->validate([
                'area'=>'required',
                'cargo'=>'required',
                'funciones'=>'required',
                'fechainicio'=>'required',
                'fechatermino'=>'required',
                'modalidad'=>'required',
                'tipocontrato'=>'required',
                'idegresado'=>'required',
                'idempresa'=>'required',
                'estado'=>'required',
            ],
            [
                'area.required'=>'Ingrese area ',
                'cargo.required'=>'Ingrese cargo ',
                'funciones.equired'=>'Ingrese funciones ',
                'fechainicio.required'=>'Ingrese fecha de inicio ',
                'fechatermino.required'=>'Ingrese fecha de término ',
                'modalidad.required'=>'Ingrese modalidad ',
                'tipocontrato.required'=>'Ingrese tipocontrato ',
                'idegresado.required'=>'Ingrese el egresado ',
                'idempresa.required'=>'Ingrese la empresa ',
                'estado.required'=>'Ingrese el estado',
                 
                ]);
      
                $expLab= Experiencialaboral::findOrfail($id);       //instanciamos nuestro modelo oferta laboral
                $expLab->area=$request->area;  //designamos el valor de descripcion
                $expLab->cargo=$request->cargo;
                $expLab->funciones=$request->funciones;
                $expLab->fechainicio=$request->fechainicio;
                $expLab->fechatermino=$request->fechatermino;
                $expLab->modalidad=$request->modalidad;
                $expLab->tipocontrato=$request->tipocontrato;
                $expLab->idegresado=$request->idegresado;
                $expLab->idempresa=$request->idempresa;
                $expLab->estado=$request->estado;
                $expLab->save();  
                
                return redirect()->route('experiencialaboral.index')->with('datos','Registro Actualizado...!');    
             
    }


  

  public function destroy($id)
  {
    $expLab=Experiencialaboral::findOrFail($id);
    $expLab->estado ='0';  
    $expLab->save();
    return redirect()->route('experiencialaboral.index')->with('datos','Experiencia Laboral Eliminado...!');
      
}

}
