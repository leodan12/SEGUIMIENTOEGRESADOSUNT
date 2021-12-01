<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienciaLaboral;
use App\Models\Empresa;
use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
class ExperiencialaboralController extends Controller
{
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $expLab=ExperienciaLaboral::where('area','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('experiencialaboral.index',compact('expLab','buscarpor'));  
  
    }

    public function create()
    {
        $empresa =Empresa::all();
        $egresado=Egresado::all();
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
  
            $expLab=new ExperienciaLaboral();    //instanciamos nuestro modelo oferta laboral
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
      $empresa=Empresa::all();
      $egresado=egresado::all();
      $expLab=ExperienciaLaboral::findOrfail($id);
      
      return view('ofertaslaborales.edit',compact('empresa','egresado','expLab'));
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
      
                $expLab= ExperienciaLaboral::findOrfail($id);       //instanciamos nuestro modelo oferta laboral
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
      $expLab=ExperienciaLaboral::findOrFail($id);
      if ( ($expLab->estado) =='1') {
       $expLab->estado='0';
       $expLab->save();
       return redirect()->route('experiencialaboral.index')->with('datos','Experiencia Laboral Desactivado...!');
          }
       elseif(($expLab->estado) =='0') {
       $expLab->estado='1';
       $expLab->save();
       return redirect()->route('experiencialaboral.index')->with('datos','Experiencia Laboral Activado...!');
       }

      }
}
