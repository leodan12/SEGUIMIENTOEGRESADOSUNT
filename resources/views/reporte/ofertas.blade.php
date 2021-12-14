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
    
      <h3 style="text-align: center">REPORTE DE OFERTAS LABORALES</h3>
      <div class="row">
          <div class="col-12">&nbsp;</div>
    </div>
    <div class="container-fluid">
      <nav class="navbar navbar-light ">
        <div class="col-3"></div>
        <form class="col-5  form-align-content-center "  method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
              <input name="año1" class="form-control" type="search"  required style="border-radius: 40px;" placeholder="Inserte Año Inicial" aria-label="Search" value="{{ $año1 }}">
              &nbsp;
              <input name="año2" class="form-control " type="search" required  style="border-radius: 40px;" placeholder="Inserte Año final" aria-label="Search" value="{{ $año2 }}">
              <br>
              <button class="btn btn-success my-2 my-sm-0" style="border-radius: 40px;" type="submit">Generar Reporte<i class="fa fa-search"></i></button>
        </form> 
        <div class="col-3"></div>
      </nav>  
      <div class="row">
        <div class="col-12" style="text-align:center;" >
          <div id="piechart" class="col-6" responsive style="width: 900px;height: 500px;margin:0px auto;"></div>
          <a href="/reporte" class="btn btn-info"> Volver</a>
      </div>
    </div>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Área', 'Ofertas'],
          @foreach($ofertasLaborales as $reg)
              ['{{$reg->area}}',{{$reg->cantidad}}],  
          @endforeach          
        ]);

        var options = {
          title: 'CANTIDAD DE OFERTAS LABORALES POR ÁREA',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

@endsection