@extends('layouts.plantillaSecretariaE')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col">
            <h1 style="text-align: center">Editar Oferta Laboral</h1>
        </div></div>
        
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
        <form method="POST"  action="{{route('ofertalaboral.update',$oferta->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
             <div class="form-row">
            
                <div class="form-group col-md-5">
                  <label for="titulo">Titulo</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo"  style="border-radius: 40px;" value="{{$oferta->titulo}}">
                  @error('titulo')
                      <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                       </span>                  
                  @enderror
               </div>
               <div class="form-group col-md-4">
                <label for="cargo">Cargo</label>
              <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo"  style="border-radius: 40px;" value="{{$oferta->cargo}}">
                @error('cargo')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-3">
                <label for="area">Area</label>
              <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area"  style="border-radius: 40px;" value="{{$oferta->area}}" >
                @error('area')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             <div class="form-group col-md-6">
                <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"  style="border-radius: 40px;" value="{{$oferta->descripcion}}">
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
             <div class="form-group col-md-3">
                <label for="disponibilidad">Disponibilidad</label>
              <input type="text" class="form-control @error('disponibilidad') is-invalid @enderror" id="disponibilidad" name="disponibilidad"  style="border-radius: 40px;" value="{{$oferta->disponibilidad}}">
                @error('disponibilidad')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>
    
             <div class="form-group col-md-3">
                <label for="tipocontrato">Tipo de Contrato</label>
              <input type="text" class="form-control @error('tipocontrato') is-invalid @enderror" id="tipocontrato" name="tipocontrato"  style="border-radius: 40px;" value="{{$oferta->tipocontrato}}">
                @error('tipocontrato')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>

             <div class="form-group col-md-6">
                <label for="funcion">Funcion</label>
              <input type="text" class="form-control @error('funcion') is-invalid @enderror" id="funcion" name="funcion"  style="border-radius: 40px;" value="{{$oferta->funcion}}">
                @error('funcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
             </div>

             <div class="form-group col-md-4">
              <label for="duracioncontrato">Duracion de Contrato</label>
            <input type="text" class="form-control @error('duracioncontrato') is-invalid @enderror" id="duracioncontrato" name="duracioncontrato"  style="border-radius: 40px;" value="{{$oferta->duracioncontrato}}" >
              @error('duracioncontrato')
                  <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                   </span>                  
              @enderror
           </div>
           <div class="form-group col-md-2">
            <label for="sueldo">Sueldo</label>
          <input type="number" class="form-control @error('sueldo') is-invalid @enderror" id="sueldo" name="sueldo"  style="border-radius: 40px;" value="{{$oferta->sueldo}}">
            @error('sueldo')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         
       <div class="col col-md-1"></div>
       <div class="form-group col-md-2">
        <label for="numerovacantes">Numero de vacantes</label>
      <input type="number" class="form-control @error('numerovacantes') is-invalid @enderror" id="numerovacantes" name="numerovacantes"  style="border-radius: 40px;" value="{{$oferta->numerovacantes}}">
        @error('numerovacantes')
            <span class="invalid-feedback" role="alert">
                 <strong>{{$message}}</strong>
             </span>                  
        @enderror
     </div>
     <div class="form-group col-md-2">
      <label for="fechaemision">Fecha de Emision</label>
    <input type="date" class="form-control @error('fechaemision') is-invalid @enderror" id="fechaemision" name="fechaemision"  style="border-radius: 40px;" value="{{$oferta->fechaemision}}">
      @error('fechaemision')
          <span class="invalid-feedback" role="alert">
               <strong>{{$message}}</strong>
           </span>                  
      @enderror
   </div>

   <div class="from-group col-md-3">
    <label for="idempresa">Empresa</label>
    <select name="idempresa" id="idempresa" class="form-control"   style="border-radius: 40px;">
        <option value="{{$oferta->empresa->id}}"  selected> {{$oferta->empresa->razonsocial}}</option>
        @foreach ( $empresa as $itemp)
    <option value="{{$itemp->id}}">{{$itemp->razonsocial}}</option>
        @endforeach
    </select>
             
</div>
    <div class="from-group col-md-2">
        <label for="">Estado</label>
        <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
            
                 @if ($oferta->estado =='1') 
                 { <option value="{{$oferta->estado}}" selected >  ACTIVO  </option>
                 <option value="0">INACTIVO</option>
                } @else 
                 { <option value="{{$oferta->estado}}" selected> INACTIVO </option>
                 <option value="1">ACTIVO</option>
                }
            @endif
             
        </select>

      </div>

    
    
    
            
             </div>
         


        
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
        <div class="row"><div class="col-12">&nbsp;</div></div>   
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mr-4" style="border-radius: 40px;"><i class="fas fa-save"></i>Guardar</button>
                    <a href="../" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
