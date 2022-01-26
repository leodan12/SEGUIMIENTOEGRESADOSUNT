<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Ofertalaboral;
use App\Models\Empresa;
use App\Models\Experiencialaboral;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class GraficoController extends Controller
{
    
    public function grafico( Request $request)
    {
     return view('reporte.grafico');
    }

    public function titulados(Request $request)
    {
        $año1=$request->get('año1');
        $año2=$request->get('año2');
        $titulados=DB::select('select * from reportetitulados(?,?)',array($año1,$año2));

        //$data=request()->validate(['año1'=>'required','año2'=>'required'],['año1.required'=>'Ingrese el año inicial','año2.required'=>'Ingrese el año final']);

        return view('reporte.titulados',compact('titulados','año1','año2'));
    }

    public function ofertas(Request $request)
    {
        $año1=$request->get('año1');
        $año2=$request->get('año2');
        $ofertasLaborales=DB::select('select * from reporteofertas(?,?)',array($año1,$año2));
        return view('reporte.ofertas',compact('ofertasLaborales','año1','año2'));
    }

    public function calidad(Request $request)
    {
        $año1=$request->get('año1');
        $año2=$request->get('año2');
        $calidadUniversitaria=DB::select('select * from reportecalidad(?,?)',array($año1,$año2));
        return view('reporte.calidad',compact('calidadUniversitaria','año1','año2'));
    }

    public function empleabilidad(Request $request)
    {
        $año1=$request->get('año1');
        $año2=$request->get('año2');
        $empleabilidad=DB::select('select * from reporteempleabilidad(?,?)',array($año1,$año2));
        return view('reporte.empleabilidad',compact('empleabilidad','año1','año2'));
    }
}
