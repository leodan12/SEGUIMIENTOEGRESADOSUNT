@extends('layouts.plantillaEgresado')
@section('contenido')
<style>
  :root {
    --body-bg-color: #1a1c1d;
    --hr-color: #26292a;
    --red: #e74c3c;
  }
  
  a {
    color: inherit;
    text-decoration: none;
  }
  
  .menu {
    display: flex;
    justify-content: center;
  }
  .alinealo{
    justify-content: center;
  }
  .menu a {
    position: relative;
    display: block;
    overflow: hidden;
  }
  
  .menu a span {
    transition: transform 0.2s ease-out;
  }
  
  .menu a span:first-child {
    display: inline-block;
    padding: 10px;
  }
  
  .menu a span:last-child {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-100%);
  }
  
  .menu a:hover span:first-child {
    transform: translateY(100%);
  }
  
  .menu a:hover span:last-child,
  .menu[data-animation] a:hover span:last-child {
    transform: none;
  }
  .menu[data-animation="to-top"] a span:last-child {
    transform: translateY(100%);
  }
  
  .menu[data-animation="to-top"] a:hover span:first-child {
    transform: translateY(-100%);
  }
  
  .menu[data-animation="to-right"] a span:last-child {
    transform: translateX(-100%);
  }
  
  .menu[data-animation="to-right"] a:hover span:first-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a span:last-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a:hover span:first-child {
    transform: translateX(-100%);
  }
  table tbody {
    background-color: #8ce1fd;
  }
  table tr:hover {
    background-color: #E3E4E5;
  }
  
  </style>
<div class="container-fluid ">
  <div class="form-group">
    
    <div class="container">
      <h3 class="text-center">LISTADO DE ENCUESTAS</h3>
      <div class="d-none d-md-block col-12" style="position: relative;right: 40%">
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../comite" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>
      <div class="col-12 d-md-none" >
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../comite" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>

    @if(session('datos'))
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <nav class="navbar navbar-light ">
      <a href="{{route('encuesta.create')}}" class="btn btn-success" style="border-radius: 40px;"><i class="fas fa-plus"></i>Registrar  Encuesta</a><br>
     <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
          <input name="buscarpor" class="form-control col-8 mr-2" type="search"  style="border-radius: 40px;" placeholder="Buscar por Titulo" aria-label="Search" value="{{ $buscarpor }}">
           <button class="btn btn-success my-2 my-sm-0" style="border-radius: 40px;" type="submit">Buscar <i class="fa fa-search"></i></button>
      </form>  <!--buscador por      -->
  
  </nav> 

      <br>
      <div class="table-responsive"  style="border-radius: 12px;">
        <table class="table" style="border-radius: 12px;">
        <thead class="thead-dark">
          <tr>
            <th scope="col"style="text-align: center">ID</th>
            <th scope="col"style="text-align: center">TITULO</th>
            <th scope="col" style="text-align: center">TIPO</th>
            <th scope="col" style="text-align: center">FECHA</th>
            <th scope="col" style="text-align: center">ESTADO</th>
            <th scope="col" style="text-align: center">REGISTRAR PREGUNTAS</th>
            <th scope="col" style="text-align: center">ESTADO ENCUESTA</th>
            <th scope="col" style="text-align: center">CAMBIAR ENCUESTA</th>
            <th scope="col" style="text-align: center">EDITAR</th>
            <th scope="col" style="text-align: center;" >ELIMINAR</th>
          </tr>
        </thead>
        <tbody>
            @foreach($encuesta  as $k)
                <tr>
                    <td style="text-align: center">{{$k->id}}</td>
                    <td style="text-align: center">{{$k->titulo}}</td>
                    <td style="text-align: center">{{$k->tipo}}</td>
                    <td style="text-align: center">{{$k->fechapublicacion}}</td>
                    <td style="text-align: center">{{$k->estado}}</td>
                    <td style="text-align: center">  
                        <div class="form-group" style="text-align: center">

                          @if($k->estadoencuesta == 'registrada')
                            
                          
                            <form class="submit-eliminar " action="{{action('PreguntaController@listap', $k->id)}}" method="post">
                               @csrf
                               <input name="_method" type="hidden" value="GET">

                               <button onclick="return confirm('Desea registrar preguntas a la encuesta?')" style="border-radius: 40px;" type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-plus" ></i>
                                      Registrar                                    
                                  </button>
                             </form>

                             @else

                             <form class="submit-eliminar "  >
                              @csrf
                              <input name="_method" type="hidden" >

                              <button onclick="return confirm('¡Esta encuesta ya fue publicada!')" style="border-radius: 40px;" type="submit" class="btn btn-success btn-sm">
                               <i class="fas fa-plus" ></i>
                                     Cerrado                                    
                                 </button>
                            </form>

                             @endif

                            </div>
                    
                    </td>
                    <td style="text-align: center">{{$k->estadoencuesta}}</td>
                    <td>
                    <div class="form-group" style="text-align: center">
                        <form class="submit-eliminar " action="{{action('EncuestaController@destroy', $k->id)}}" method="post">
                           @csrf
                           <input name="_method" type="hidden" value="DELETE">
                           <button onclick="return confirm('Desea cambiar el estado de la encuesta?')" style="border-radius: 40px;" type="submit" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit" ></i>
                             
                                @if ($k->estadoencuesta == 'registrada')
                                  Publicar                                    
                                @elseif($k->estadoencuesta == 'publicada')
                                  Cerrar
                                @else 
                                  Cerrada                                    
                                @endif
                            
                             
                        </button>
                         </form>
                        </div>
                    </td>
                    <td class="menu" data-animation="to-left">  
                      <a href="{{route('encuesta.edit',$k->id)}}"> 
                        <span><b>EDITAR</b></span>
                        <span>
                          <i class="fas fa-edit" aria-hidden="true"></i>
                        </span>
                      </a> 
                    </td>
                    <td>
                      <div class="form-group" style="text-align: center">
                        <form class="submit-eliminar " action="{{action('EncuestaController@estado', $k->id)}}" method="post">
                           @csrf
                           <input name="_method" type="hidden" value="GET">
                           <button onclick="return confirm('Desea cambiar el estado de la encuesta?')" style="border-radius: 40px;" type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash" ></i>
                             
                                @if ($k->estado == '1')
                                  Desactivar                                    
                                @else
                                  Activar                                    
                                @endif
                            
                             
                        </button>
                         </form>
                        </div>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>  
    <a href="../secretariaE" style="margin-left: 95%" class="btn btn-info btn-sm">
      <i class="fas fa-backward"></i> Volver</a>
      <div class="align-center" style="margin-left: 45%"><h5></h5></div>
</div>

@endsection