@extends('layouts.plantillaSecretariaE')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col">
            <h1 style="text-align: center">Editar Empresa</h1>
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
        <form method="POST"  action="{{route('empresa.update',$empresa->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div class="form-row">
            
            <div class="form-group col-md-4">
              <label for="razonsocial">Razon soncial</label>
            <input type="text" class="form-control @error('razonsocial') is-invalid @enderror" id="razonsocial" name="razonsocial"  style="border-radius: 40px;" value="{{$empresa->razonsocial}}">
              @error('razonsocial')
                  <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                   </span>                  
              @enderror
           </div>
           <div class="form-group col-md-5">
            <label for="mision">Mision</label>
          <input type="text" class="form-control @error('mision') is-invalid @enderror" id="mision" name="mision"  style="border-radius: 40px;" value="{{$empresa->mision}}">
            @error('mision')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         <div class="form-group col-md-3">
            <label for="direccion">Direccion</label>
          <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion"  style="border-radius: 40px;" value="{{$empresa->direccion}}">
            @error('direccion')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>

         <div class="form-group col-md-2">
            <label for="telefono">Telefono</label>
          <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono"  style="border-radius: 40px;" value="{{$empresa->telefono}}">
            @error('telefono')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
         <div class="form-group col-md-4">
            <label for="email">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  style="border-radius: 40px;" value="{{$empresa->email}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>

         <div class="form-group col-md-4">
            <label for="web">Web</label>
          <input type="text" class="form-control @error('web') is-invalid @enderror" id="web" name="web"  style="border-radius: 40px;" value="{{$empresa->web}}">
            @error('web')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>
             
         <div class="from-group col-md-2">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                
              @if ($empresa->estado =='1') 
              { <option value="{{$empresa->estado}}" selected >  ACTIVO  </option>
              <option value="0">INACTIVO</option>
             } @else 
              { <option value="{{$empresa->estado}}" selected> INACTIVO </option>
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
