@extends('layouts.plantillaSecretariaE')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva Oferta Laboral</h1>
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
  
        <form method="POST"  action="{{route('ofertalaboral.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
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
                <label for="cargo">Cargo</label>
              <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo"  style="border-radius: 40px;" >
                @error('cargo')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-3">
                <label for="area">Area</label>
              <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area"  style="border-radius: 40px;" >
                @error('area')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             <div class="form-group col-md-6">
                <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"  style="border-radius: 40px;" >
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-3">
                <label for="disponibilidad">Disponibilidad</label>
              <input type="text" class="form-control @error('disponibilidad') is-invalid @enderror" id="disponibilidad" name="disponibilidad"  style="border-radius: 40px;" >
                @error('disponibilidad')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             <div class="form-group col-md-3">
                <label for="tipocontrato">Tipo de Contrato</label>
              <input type="text" class="form-control @error('tipocontrato') is-invalid @enderror" id="tipocontrato" name="tipocontrato"  style="border-radius: 40px;" >
                @error('tipocontrato')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>

             <div class="form-group col-md-6">
                <label for="funcion">Funcion</label>
              <input type="text" class="form-control @error('funcion') is-invalid @enderror" id="funcion" name="funcion"  style="border-radius: 40px;" >
                @error('funcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>

             <div class="form-group col-md-4">
              <label for="duracioncontrato">Duracion de Contrato</label>
            <input type="text" class="form-control @error('duracioncontrato') is-invalid @enderror" id="duracioncontrato" name="duracioncontrato"  style="border-radius: 40px;" >
              @error('duracioncontrato')
                  <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                   </span>                  
              @enderror
           </div>
           <div class="form-group col-md-2">
            <label for="sueldo">Sueldo</label>
          <input type="number" class="form-control @error('sueldo') is-invalid @enderror" id="sueldo" name="sueldo"  style="border-radius: 40px;" >
            @error('sueldo')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         
       <div class="col col-md-1"></div>
       <div class="form-group col-md-2">
        <label for="numerovacantes">Numero de vacantes</label>
      <input type="number" class="form-control @error('numerovacantes') is-invalid @enderror" id="numerovacantes" name="numerovacantes"  style="border-radius: 40px;" >
        @error('numerovacantes')
            <span class="invalid-feedback" role="alert">
                 <strong>{{$message}}</strong>
             </span>                  
        @enderror
     </div>
     <div class="form-group col-md-2">
      <label for="fechaemision">Fecha de Emision</label>
    <input type="date" class="form-control @error('fechaemision') is-invalid @enderror" id="fechaemision" name="fechaemision"  style="border-radius: 40px;" >
      @error('fechaemision')
          <span class="invalid-feedback" role="alert">
               <strong>{{$message}}</strong>
           </span>                  
      @enderror
   </div>

   <div class="from-group col-md-4">
    <label for="idempresa">Empresa</label>
    <select name="idempresa" id="idempresa" class="form-control"   style="border-radius: 40px;"   >
        <option value="{{ old('idempresa') }}" disabled selected> SELECCIONE UNA EMPRESA:</option>
        @foreach ( $empresa as $itemp)
    <option value="{{$itemp->id}}">{{$itemp->razonsocial}}</option>
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
 