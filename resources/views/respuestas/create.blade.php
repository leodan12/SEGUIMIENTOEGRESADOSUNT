@extends('layouts.plantillaEgresado')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva Respuesta</h1>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">&nbsp;</div>
    </div>
 
  
        <form method="POST" action="{{route('respuesta.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="pregunta_id">Pregunta</label>
                  <input type="text" class="form-control @error('pregunta_id') is-invalid @enderror" id="pregunta_id" name="pregunta_id"  style="border-radius: 40px;" readonly value="{{$pregunta[0]->id}}">
                    @error('pregunta_id')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                         </span>                  
                    @enderror
                 </div>
                <div class="form-group col-md-11">
                    <label for="pregunta">Pregunta</label>
                  <input type="text" class="form-control @error('pregunta') is-invalid @enderror" id="pregunta" name="pregunta"  style="border-radius: 40px;" readonly value="{{$pregunta[0]->enunciado}}">
                    @error('pregunta')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                         </span>                  
                    @enderror
                 </div>
                <div class="form-group col-md-12">
                  <label for="enunciado">Respuesta</label>
                <input type="text" class="form-control @error('enunciado') is-invalid @enderror" id="enunciado" name="enunciado"  style="border-radius: 40px;" required>
                  @error('enunciado')
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
                    <a href="{{route('listarpreguntas',$pregunta[0]->encuesta_id)}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 