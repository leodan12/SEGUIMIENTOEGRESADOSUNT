@extends('layouts.plantillaEgresado')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva Publicacion</h1>
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
  
        <form method="POST"  action="{{route('publicacion.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
            
                <div class="form-group col-md-5">
                  <label for="titulo">Titulo</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo"  style="border-radius: 40px;" >
                  @error('titulo')
                      <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                       </span>                  
                  @enderror
               </div>
               <div class="form-group col-md-4">
                <label for="tematica">Tematica</label>
              <input type="text" class="form-control @error('tematica') is-invalid @enderror" id="tematica" name="tematica"  style="border-radius: 40px;" >
                @error('tematica')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-3">
                <label for="edicion">Edicion</label>
              <input type="text" class="form-control @error('edicion') is-invalid @enderror" id="edicion" name="edicion"  style="border-radius: 40px;" >
                @error('edicion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             <div class="form-group col-md-6">
                <label for="editorial">Editorial</label>
              <input type="text" class="form-control @error('editorial') is-invalid @enderror" id="editorial" name="editorial"  style="border-radius: 40px;" >
                @error('editorial')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-3">
                <label for="isbn">ISBN</label>
              <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"  style="border-radius: 40px;" >
                @error('isbn')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             <div class="form-group col-md-3">
                <label for="ruta">Ruta</label>
              <input type="text" class="form-control @error('ruta') is-invalid @enderror" id="ruta" name="ruta"  style="border-radius: 40px;" >
                @error('ruta')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>

      <div class="form-group col-md-2">
        <label for="fechapublicacion">Fecha de Publicación</label>
      <input type="date" class="form-control @error('fechapublicacion') is-invalid @enderror" id="fechapublicacion" name="fechapublicacion"  style="border-radius: 40px;" >
        @error('fechapublicacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>                  
        @enderror
    </div>

   <div class="from-group col-md-4">
    <label for="idegresado">Egresado</label>
    <select name="idegresado" id="idegresado" class="form-control"   style="border-radius: 40px;"   >
        <option value="{{ old('idegresado') }}" disabled > :</option>
        @foreach ( $egresado as $itemp)
    <option value="{{$itemp->id}}">{{$itemp->nombres}}</option>
        @endforeach
    </select>

  </div>
                 
      <div class="from-group col-md-2">
          <label for="estado">Estado</label>
          <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                    
            <option value="1"  selected>ACTIVO</option>
            <option value="0">INACTIVO</option>
          </select>
    
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
                    <a href="./" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 