<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8" />
 <link rel="apple-touch-icon" sizes="76x76"  href="../../img/apple-icon.png">
 <link rel="icon" type="../../image/png" href="../../img/centrotpf.png">  <!--logo arriba--> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SEGUNT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--    FUENTESITAS E ICONOS     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"  />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS  -->
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <!--   -->
    <link rel="stylesheet" href="../../../css/now-ui-kit.css?v=1.3.0"> 
  <link rel="stylesheet" href="../../../css/demo.css">
  <!-- LOGIN PROF -->

  <link rel="stylesheet" href="../../../adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../../css/login.css">
  <link rel="stylesheet" href="../../../css/style.css">
  <!-- MENÚ -->

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="../../../css/bootstrap02.min.css" >

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="../../../css/all.min.css"  type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" type="text/css">
  <link rel="stylesheet" href="../../../css/simple-line-icons.css" >

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../../css/stylish-portfolio.min.css" >

</head>

<body class="login-page sidebar-collapse">
 <!-- NAV BARRA -->






 <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400" >

    <div class="collapse navbar-collapse justify-content-start" filter-color="black" id="navigation"  filter-color="black" >
        <ul class="navbar-nav">
        
          
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Inicio" data-placement="bottom" href="/secretariaE">
                <img class="img-fluid" src="../../img/inicio.png">
                
                 
            </a>
          </li>

            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Logueado como secretaria de escuela" data-placement="bottom" href="#">
              <h5> SECRETARIA DE ESCUELA</h5>       
            </a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Gestionar Empresas" data-placement="bottom" href="/empresas">
              <h5>EMPRESAS</h5>
            </a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Gestionar Ofertas Laborales" data-placement="bottom" href="/ofertaslaborales">
              <h5>OFERTAS LABORALES</h5>
            </a>
          </li>
         
        </ul>
      </div>

      <div class="content-section-heading" >

        
        <a class="navbar-brand" href="#" rel="tooltip" title="Hemos trabajado mucho en este proyecto" data-placement="bottom" >    
            <div class="d-md-none h6" >⭐ BIENVENIDO A EL PROYECTO DE ING DE SOFTWARE II⭐</div>
            <div class="d-none d-md-block h5" >⭐ BIENVENIDO A EL PROYECTO DE ING DE SOFTWARE II⭐</div>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" style="position: absolute;bottom: 18px; right: 5px;">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      
      <div class="collapse navbar-collapse justify-content-end  " filter-color="black" id="navigation"  filter-color="black" >
       <ul class="navbar-nav ml-auto">

           

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-fluid" src="../../img/salir.png"> <br>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

          
            </li>

           

          </ul>
      </div>

    </div>
  </nav>
  <!-- FIN  NAVBARRA -->

  <div class="page-header clear-filter" filter-color="black"> <!-- inidio y fin de fondo  -->
    <div class="page-header-image" style="background-image:url(../../img/unt.jpg)"> </div> <!-- fondo  -->
    <!-- centro -->
    

       
      
        <!-- Header -->
        <header >
       
          <div class="container my-auto" style="position: absolute; top: 37%; left: 30%; height: 40%; margin: 0 0 0 -25%;">

            <h1 class="mb-1" >UNIVERSIDAD NACIONAL DE TRUJILLO</h1> 
            <h3 class="mb-5">
              <em>SEGUIMIENTO DE EGRESADOS </em>
            </h3>

            <h3 class="mb-5">
             
            </h3>
          </div>
          
          <div class="overlay"></div>
        </header>
  </div>

      
        
    <div class="page-header clear-filter" >
      <div class="page-header-image" style="background-image:url(../../img/portfolio-1.jpg)"> </div> <!-- fondo  -->
      <div class="content">
  
        
                  <section class="content"><!-- aquí va la tabla -->
                    @yield ('contenido')
                  </section>
              
             
     
         </div>
    </div>

        
      
       
        <!--  MENU scripts-->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript -->
        <script src="../../adminlte/dist/js/menu/jquery.min.js"></script>
        <script src="../../adminlte/dist/js/menu/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="../../adminlte/dist/js/menu/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="../../adminlte/dist/js/menu/stylish-portfolio.min.js"></script>


        <!-- fin centro -->
   




    
  
  </div>
  <!--   Core JS ARCCHIVOS   -->

  <script src="../../adminlte/dist/js/core/jquery.min.js"></script>        
  <script src="../../adminlte/dist/js/core/popper.min.js"></script>        
  <script src="../../adminlte/dist/js/core/bootstrap.min.js"></script>        


  <!--  DE AQUÍ SAQUÉ ALGUNOS PLUGINS: http://refreshless.com/nouislider/ -->
  <script src="../../adminlte/plugins/gg/js/plugins/nouislider.min.js"></script>



  <!--  Google Maps ESTE SCRIPT SOLO LO PEGUÉ xdddd    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- CENTRO DE EFECTOS Y SCRIPTS-->
  <script src="../../adminlte/dist/js/now-ui-kit.js?v=1.3.0"></script>        
  <!-- LOGIN PROF-->

       <script src="../../adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="../../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../adminlte/dist/js/adminlte.min.js"></script>  

        


</body>

</html>