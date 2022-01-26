@extends('layouts.plantillaSecretariaC')
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
      <h3 class="text-center">LISTADO DE OFERTAS LABORALES</h3>
      <div class="d-none d-md-block col-12" style="position: relative;right: 40%">
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../secretariaC" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>
      <div class="col-12 d-md-none" >
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../secretariaC" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
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
      <br>
     <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
          <input name="buscarpor" class="form-control col-8 mr-2" type="search"  style="border-radius: 40px;" placeholder="Buscar por Nombre" aria-label="Search" value="{{ $buscarpor }}">
           <button class="btn btn-success my-2 my-sm-0" style="border-radius: 40px;" type="submit">Buscar <i class="fa fa-search"></i></button>
      </form>  <!--buscador por      -->
  
  </nav> 

      <br>
      <div class="table-responsive"  style="border-radius: 12px;">
        <table class="table" style="border-radius: 12px;">
        <thead class="thead-dark">
          <tr>
            <!--     
            <th scope="col"style="text-align: center">TITULO</th> -->
            <th scope="col"style="text-align: center">CARGO</th>
            <th scope="col" style="text-align: center">AREA</th>
            <!--   <th scope="col" style="text-align: center">DESCRIPCION</th> 
            <th scope="col" style="text-align: center">DISPONIBILIDAD</th>-->
            <th scope="col" style="text-align: center">TIPO CONTRATO</th>
            <th scope="col" style="text-align: center">DURACION CONTRATO</th>
            <th scope="col" style="text-align: center">SUELDO</th>
           <!--  <th scope="col" style="text-align: center">FUNCION</th>-->
            <th scope="col" style="text-align: center">VACANTES</th>
            <th scope="col" style="text-align: center">FECHA</th>
            <th scope="col" style="text-align: center">EMPRESA</th>
             
             
          </tr>
        </thead>
        <tbody>
            @foreach($oferta as $k)
                <tr>
                      
                    <td style="text-align: center">{{$k->cargo}}</td>
                    <td style="text-align: center">{{$k->area}}</td>
                     
                    <td style="text-align: center">{{$k->tipocontrato}}</td>
                    <td style="text-align: center">{{$k->duracioncontrato}}</td>
                    <td style="text-align: center">{{$k->sueldo}}</td>
                     
                    <td style="text-align: center">{{$k->numerovacantes}}</td>
                    <td style="text-align: center">{{$k->fechaemision}}</td>
                    <td style="text-align: center">{{$k->empresa->razonsocial}}</td>
                    
                     
                     
                     
                </tr>   
            @endforeach
        </tbody>
    </table>  
    <a href="../secretariaE" style="margin-left: 95%" class="btn btn-info btn-sm">
      <i class="fas fa-backward"></i> Volver</a>
      <div class="align-center" style="margin-left: 45%"><h5></h5></div>
</div>

@endsection