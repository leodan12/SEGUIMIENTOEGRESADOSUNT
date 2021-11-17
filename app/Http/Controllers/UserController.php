<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;  //aca esta request, significa solicitud.
use Illuminate\Support\Facades\Auth;   //siempre poner esto
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $usuarios=User::where('estado','=',TRUE)->where('name','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
       // $user=User::where('estado','=',TRUE)->get();
        return   view('usuarios.index',compact('usuarios','buscarpor'));  

    }
    
    
    public function login(Request $request){          //Vamos a realizar una validacion
        
        
        $data=request()->validate([    //es validate

            'name'=>'required',   //es required
            'password'=>'required'      //no va COOOOOOMA
        
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',

        ]);

        if(Auth::attempt($data)){  //   Vamos a tener diferentes paginas

            $con='OK';
        }

        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if($query->count() !=0){    //count significa que no es igual a 0 , cuenta, encontro al usuario

            $hashp=$query[0]->password;
            $password=$request->get('password');
            $perfils_id=$request->get('perfils_id');

            if (password_verify($password,$hashp)) {   //si son iguales
               if(Auth::user()->perfils_id=='1'){
                return redirect('/administrador');
               }
               elseif(Auth::user()->perfils_id=='2'){
                return redirect('/secretariaE');
               }
               elseif(Auth::user()->perfils_id=='3'){
                return redirect('/secretariaC');
               }
               elseif(Auth::user()->perfils_id=='4'){
                return redirect('/comite');
               }
               elseif(Auth::user()->perfils_id=='5'){
                return redirect('/egresado');
               }
               else                
               return route('logout') ;
                

            }else{
                return back()->withErrors(['password'=>'Contraseña no válida '])->withInput([request('password')]);
            }

        }else{

            return back()->withErrors(['name'=>'Usuario no válido'])->withInput([request('usuario')]);

        }
    }
    /*public function create()
    {
        return view('cuenta');
    }
    public function RegistrarUser()
    {
        return view('cuenta');
    }*/
    public function integrantes()
    {
        return view('integrantes');
    }

    public function store(Request $request)
    {   
        $data=request()->validate([
            'name'=>'required|max:30',
            'email'=>'required',
            'perfils_id'=>'required',
            'password'=>'required|max:30'
        ],[
            'name.required'=>'Ingrese un nombre de usuario',
            'name.max'=>'maximo de 30 caracteres para nombre',
            'password.required'=>'Ingrese una contraseña  ',
            'password.max'=>'maximo de 30 caracteres para contraseña',
        ]);


        if(Auth::attempt($data))
        {
          $con='OK'  ;
        }
        
        $codigo=$request->get('codigo');
      
        //if($query->count() !=0)
        //{
            $users= new User();
            $users->name=$request->name;
            $users->email=$request->email;
            $users->password=Hash::make($request->password) ;
            $users->perfils_id=$request->perfils_id;
            $users->save();
           // return view('index');
           return redirect()->route('RegistrarUser')->with('datos','Registro Guardado Correctamente...!');
       // }
      //  else{//RegistrarUser
       //     return redirect()->route('RegistrarUser')->with('datos','Registro Erroneo...!');
            //return back()->withErrors(['codigo'=>'Codigo de Docente no Valido'])->withImput([request('codigo')]);
       // }

       
       //return redirect()->route('RegistrarUser');
    }

}


   




