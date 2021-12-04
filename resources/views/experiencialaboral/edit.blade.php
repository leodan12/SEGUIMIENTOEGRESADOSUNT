@extends('layouts.plantillaEgresado')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col">
            <h1 style="text-align: center">Editar Experiencia Laboral</h1>
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
        <form method="POST"  action="{{route('experiencialaboral.update',$expLab->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
             <div class="form-row">
            
               <div class="from-group col-md-4">
                 <label for="idegresado">EGRESADO</label>
                 <select name="idegresado" id="idegresado" class="form-control" disabled="disabled"style="border-radius: 40px;">
                  <option value="{{$expLab->egresado->id}}"  selected="selected "> {{$expLab->egresado->apellidos}} {{$expLab->egresado->nombres}}</option>
                </select>
              </div>
              
            <div class="form-group col-md-5">
              <label for="area">Área</label>
            <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area"  style="border-radius: 40px;" value="{{$expLab->area}}" >
              @error('area')
                  <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                   </span>                  
              @enderror
           </div>

           <div class="form-group col-md-4">
            <label for="cargo">Cargo</label>
           <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo"  style="border-radius: 40px;" value="{{$expLab->cargo}}">
            @error('cargo')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         <div class="form-group col-md-3">
            <label for="area">Funciones</label>
          <input type="text" class="form-control @error('funciones') is-invalid @enderror" id="funciones" name="funciones"  style="border-radius: 40px;" value="{{$expLab->funciones}}" >
            @error('funciones')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         <div class="form-group col-md-2">
           <label for="fechainicio">Fecha de Incio</label>
         <input type="date" class="form-control @error('fechainicio') is-invalid @enderror" id="fechainicio" name="fechainicio"  style="border-radius: 40px;" value="{{$expLab->fechainicio}}">
           @error('fechainicio')
               <span class="invalid-feedback" role="alert">
                   <strong>{{$message}}</strong>
               </span>                  
           @enderror
       </div>
         <div class="form-group col-md-2">
           <label for="fechatermino">Fecha de Término</label>
         <input type="date" class="form-control @error('fechatermino') is-invalid @enderror" id="fechatermino" name="fechatermino"  style="border-radius: 40px;" value="{{$expLab->fechatermino}}">
           @error('fechatermino')
               <span class="invalid-feedback" role="alert">
                   <strong>{{$message}}</strong>
               </span>                  
           @enderror
       </div>
         <div class="form-group col-md-3">
            <label for="modalidad">Modalidad</label>
          <input type="text" class="form-control @error('modalidad') is-invalid @enderror" id="modalidad" name="modalidad"  style="border-radius: 40px;"value="{{$expLab->modalidad}}" >
            @error('modalidad')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         <div class="form-group col-md-3">
            <label for="tipocontrato">Tipo de Contrato</label>
          <input type="text" class="form-control @error('tipocontrato') is-invalid @enderror" id="tipocontrato" name="tipocontrato"  style="border-radius: 40px;"value="{{$expLab->tipocontrato}} ">
            @error('tipocontrato')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>

      <div class="from-group col-md-4">
        <label for="idempresa">Empresa</label>
        <select name="idempresa" id="idempresa" class="form-control"   style="border-radius: 40px;"   >
            <option value="{{$expLab->empresa->id }}"  selected>{{$expLab->empresa->razonsocial}}</option>
            @foreach ( $empresa as $itemp)
        <option value="{{$itemp->id}}">{{$itemp->razonsocial}}</option>
            @endforeach
        </select>

      </div>
             
      <div class="from-group col-md-2">
          <label for="estado">Estado</label>
          <select name="estado" id="estado" class="form-control" disabled required  style="border-radius: 40px;">
                    
            <option value="1"  selected>ACTIVO</option>
            <option value="0">INACTIVO</option>
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
<script>
// With jQuery
//Para que se pueda enviar el atributo de un select disabled
jQuery(function ($) {        
  $('form').bind('submit', function () {
    $(this).find(':input').prop('disabled', false);
  });
});
</script>