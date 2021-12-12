@extends('layouts.plantillaEgresado')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva Encuesta</h1>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">&nbsp;</div>
    </div>

    @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
      {{ session('datos')   }}
        <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  </div>
  @endif
  
        <form method="POST"  action="{{route('encuesta.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
            
                <div class="form-group col-md-6">
                  <label for="titulo">Titulo</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo"  style="border-radius: 40px;" required>
                  @error('titulo')
                      <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                       </span>                  
                  @enderror
               </div>
               <div class="form-group col-md-4">
                <label for="tipo">Tipo</label>
              <input type="text" class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo"  style="border-radius: 40px;" required>
                @error('tipo')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-2">
                <label for="fechapublicacion">Fecha</label>
              <input type="date" class="form-control @error('fechapublicacion') is-invalid @enderror" id="fechapublicacion" name="fechapublicacion"  style="border-radius: 40px;" >
                @error('fechapublicacion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             
    
    
    
            </div>
    
    
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" style="border-radius: 40px;" class="btn btn-primary mr-4" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarEncuesta')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 