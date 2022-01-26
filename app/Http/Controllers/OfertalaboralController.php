<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ofertalaboral;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class OfertalaboralController extends Controller
{
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $oferta=Ofertalaboral::where('titulo','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        
     //  $user=perfil::where('estado','=',TRUE)->get();
        return  view('ofertaslaborales.index',compact('oferta','buscarpor'));  
  
    }
    
    public function index2( Request $request){

        $buscarpor=$request->get('buscarpor');
        $oferta=Ofertalaboral::where('titulo','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
        $empresa=Empresa::where('estado','=','1')->get();
     //  $user=perfil::where('estado','=',TRUE)->get();
     
        return  view('ofertaslaborales.index2',compact('empresa','oferta','buscarpor'));  
  
    }

    public function create()
    {
        $empresa =Empresa::all();
        
        return view('ofertaslaborales.create' ,compact('empresa'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'titulo'=>'required',
            'cargo'=>'required',
            'area'=>'required',
            'descripcion'=>'required',
            'disponibilidad'=>'required',
            'tipocontrato'=>'required',
            'funcion'=>'required',
            'duracioncontrato'=>'required',
            'sueldo'=>'required',
            'numerovacantes'=>'required',
            'fechaemision'=>'required',
            'idempresa'=>'required',
            'estado'=>'required'
        ],
        [
            'titulo.required'=>'Ingrese titulo ',
            'cargo.required'=>'Ingrese cargo ',
            'area.required'=>'Ingrese area ',
            'descripcion.required'=>'Ingrese descripcion ',
            'disponibilidad.required'=>'Ingrese disponibilidad ',
            'tipocontrato.required'=>'Ingrese tipocontrato ',
            'funcion.required'=>'Ingrese funcion ',
            'duracioncontrato.required'=>'Ingrese duracion del contrato ',
            'sueldo.required'=>'Ingrese sueldo ',
            'numerovacantes.required'=>'Ingrese numero de vacantes ',
            'fechaemision.required'=>'Ingrese fecha de emision ',
            'idempresa.required'=>'Ingrese empresa ',
            'estado.required'=>'Ingrese estado '
             
            ]);
  
            $oferta=new Ofertalaboral();    //instanciamos nuestro modelo oferta laboral
            $oferta->titulo=$request->titulo;  //designamos el valor de descripcion
            $oferta->cargo=$request->cargo;
            $oferta->area=$request->area;
            $oferta->descripcion=$request->descripcion;
            $oferta->disponibilidad=$request->disponibilidad;
            $oferta->tipocontrato=$request->tipocontrato;
            $oferta->duracioncontrato=$request->duracioncontrato;
            $oferta->sueldo=$request->sueldo;
            $oferta->funcion=$request->funcion;
            $oferta->numerovacantes=$request->numerovacantes;
            $oferta->fechaemision=$request->fechaemision;
            $oferta->idempresa=$request->idempresa;
            $oferta->estado=$request->estado;  //designamos el valor de descripcion
            $oferta->save();  
            
            return redirect()->route('ofertalaboral.index')->with('datos','Registro Guardado...!');    
           
    }


    public function edit($id)
  {
      $empresa=Empresa::all();
      $oferta=Ofertalaboral::findOrfail($id);
      
      return view('ofertaslaborales.edit',compact('empresa','oferta'));
  }


  
  public function update(Request $request, $id)
    {
          $data=request()->validate([
                'titulo'=>'required',
                'cargo'=>'required',
                'area'=>'required',
                'descripcion'=>'required',
                'disponibilidad'=>'required',
                'tipocontrato'=>'required',
                'funcion'=>'required',
                'duracioncontrato'=>'required',
                'sueldo'=>'required',
                'numerovacantes'=>'required',
                'fechaemision'=>'required',
                'idempresa'=>'required',
                'estado'=>'required'
            ],
            [
                'titulo.required'=>'Ingrese titulo ',
                'cargo.required'=>'Ingrese cargo ',
                'area.required'=>'Ingrese area ',
                'descripcion.required'=>'Ingrese descripcion ',
                'disponibilidad.required'=>'Ingrese disponibilidad ',
                'tipocontrato.required'=>'Ingrese tipocontrato ',
                'funcion.required'=>'Ingrese funcion ',
                'duracioncontrato.required'=>'Ingrese duracion del contrato ',
                'sueldo.required'=>'Ingrese sueldo ',
                'numerovacantes.required'=>'Ingrese numero de vacantes ',
                'fechaemision.required'=>'Ingrese fecha de emision ',
                'idempresa.required'=>'Ingrese empresa ',
                'estado.required'=>'Ingrese estado '
                 
                ]);
      
                $oferta= Ofertalaboral::findOrfail($id);       //instanciamos nuestro modelo oferta laboral
                $oferta->titulo=$request->titulo;  //designamos el valor de descripcion
                $oferta->cargo=$request->cargo;
                $oferta->area=$request->area;
                $oferta->descripcion=$request->descripcion;
                $oferta->disponibilidad=$request->disponibilidad;
                $oferta->tipocontrato=$request->tipocontrato;
                $oferta->duracioncontrato=$request->duracioncontrato;
                $oferta->sueldo=$request->sueldo;
                $oferta->funcion=$request->funcion;
                $oferta->numerovacantes=$request->numerovacantes;
                $oferta->fechaemision=$request->fechaemision;
                $oferta->idempresa=$request->idempresa;
                $oferta->estado=$request->estado;  //designamos el valor de descripcion
                $oferta->save();  
                
                return redirect()->route('ofertalaboral.index')->with('datos','Registro Guardado...!');    
             
    }


  

  public function destroy($id)
  {
      $oferta=Ofertalaboral::findOrFail($id);
      if ( ($oferta->estado) =='1') {
       $oferta->estado='0';
       $oferta->save();
       return redirect()->route('ofertalaboral.index')->with('datos','Oferta Laboral Desactivado...!');
          }
       elseif(($oferta->estado) =='0') {
       $oferta->estado='1';
       $oferta->save();
       return redirect()->route('ofertalaboral.index')->with('datos','Oferta Laboral Activado...!');
       }

      }

}
