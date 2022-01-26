@extends('layouts.plantillaComite')
@section('contenido')
<style>
  #outer {
    width: 100%;
    text-align: center;
    }
  
    #inner {
    display: inline-block;
    width: 50%
    }
</style>
<div class="container-fluid" >
  <h3 style="text-align: center">REPORTES</h3>
</div>
    <div class="container-fluid">
      <div class="row row-cols-lg-1  no-gutters">
          <div class="col-12 col-md-6 ">
            <a class="portfolio-item" href="/titulados">
              <div class="caption">
                <div class="caption-content">
                  <div class="h1">TITULADOS</div>
                  <p class="mb-0">Ver Reporte de Titulados</p>
                </div>
              </div>
              <img class="img-fluid" src="/img/titulados.jpg" alt="">
            </a>
        </div>
          <div class="col-12 col-md-6 ">
            <a class="portfolio-item" href="/ofertas">
              <div class="caption">
                <div class="caption-content">
                  <div class="h1">OFERTAS LABORALES</div>
                  <p class="mb-0">Ver Reporte de Ofertas Laborales</p>
                </div>
              </div>
              <img class="img-fluid" src="/img/ofertas.jpg" alt="">
            </a>
          </div> 
          <div class="col-12 col-md-6 ">
            <a class="portfolio-item" href="/calidad">
              <div class="caption">
                <div class="caption-content">
                  <div class="h1" >CALIDAD UNIVERSITARIA</div>
                  <p class="mb-0">Ver Reporte de Calidad Universitaria</p>
                </div>
              </div>
              <img class="img-fluid" src="/img/calidad.jpg" alt="">
            </a>
          </div> 
          <div class="col-12 col-md-6 ">
            <a class="portfolio-item" href="/empleo">
              <div class="caption">
                <div class="caption-content">
                  <div class="h1">EMPLEABILIDAD</div>
                  <p class="mb-0">Ver Reporte de Empleabilidad</p>
                </div>
              </div>
              <img class="img-fluid" src="/img/empleabilidad.jpg" alt="">
            </a>
          </div> 
    </div>
  </div>
@endsection