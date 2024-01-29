<?php 
//seguridad de sessiones paginacion
session_start();
error_reporting(0);


$varsesionlocal= $_SESSION['usuario'];
if($varsesionlocal== null || $varsesionlocal=''){


    header("location:../index.php");
    die();
    
}

?>
      <?php
  
 include 'conexion-tabla.php';
  
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();
  session_start(); 

  $id_menor=$_GET['id_menor'];

  $consulta2 = "SELECT * FROM menor WHERE id_menor='$id_menor'";
  $resultado2 = $conexion->prepare($consulta2);
  $resultado2->execute();
  $row2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
  

                        foreach($row2 as $row2){
                    
  
                        }
 $row2_id_usuario = $row2['id_menor'];

// Asignar el valor a $_SESSION['usuario']
$_SESSION['id_menor'] = $row2_id_usuario;

// Asignar el valor a $usuario
$row2_id_usuarios = $_SESSION['id_menor'];



                    
                    ?>
                 
                 
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Inicio</title>

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="css/style.css">
<link href="css/carousel2.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  

                        

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MI HISTORIAL DEL CRECIMIENTO Y PESO</a>
    <a class="nav-link active blue-box"href="home.php">Panel principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
           <li class="nav__item">
            <a class="nav-link active blue-box"href="#">Inicio</a>
            </li>
            <li class="nav__item">
              <a class="nav-link" href="TallaPeso.php">Peso y Talla</a>
            </li>
            <li class="nav__item">
            <a class="nav-link" href="Vacunas.php">Vacunas</a>
            </li>
            <li class="nav__item">
              <a class="nav-link" href="sugerencias.php">Sugerencias</a>
            </li>
            
           
           
        <li class="nav__item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones de Cuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       
       
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../cerrarSesion.php">Cerrar Sesión</a>
        </div>
      </li>
      </ul>
    </div>
  </div>
</nav>
<CENTER>
<h1>BIENVENIDO</h1>
                      </CENTER>
                      </br>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
       <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
  <image xlink:href="./inicio/plato_bien_comer_2.jpg" width="90%" height="90%" />
</svg>

<br>
        <br>
      <br>
        <div class="container">
          <div class="carousel-caption text-start">
          
            <h3 style="color: black;">PLATO DEL BUEN COMER</h3>
            <p style="color: black;">Representacion de una buena nutricion </p>
            
          <!----- <p><a class="btn btn-lg btn-primary" href="#">Conocer mas...</a></p> -->
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <image xlink:href="./inicio/Jarra_buen_beber.png" width="100%" height="100%" />
        </svg>
        <div class="container">
         
          <div class="carousel-caption text-start" style="margin-top: 90px;">
          
            <h3 style="color: black;">JARRA DEL BUEN BEBER</h3>
            <p style="color: black;">Representación de una buena nutrición</p>
          
        
          
          
      <!--- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>-->
          </div>
        </div>
      </div>
     
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Recomendaciones.</h2>
        <p class="lead">Para garantizar la salud de niñas, niños y adolescentes es fundamental elegir alimentos saludables y construir entornos que favorezcan su desarrollo físico y mental. Conoce algunos consejos básicos de alimentación saludable en la niñez y adolescencia.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <image xlink:href="./inicio/plato_bien_comer_3.jpg" width="90%" height="90%" />
        </svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Recomendaciones </h2>
        <p class="lead">Fomenta la hidratación durante la actividad física: Anima a tu hijo a beber agua antes, durante y después de realizar actividades físicas o deportivas. Enséñales la importancia de mantenerse hidratados cuando están activos.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <image xlink:href="./inicio/Jarra_buen_beber.png" width="100%" height="100%" />
        </svg>
      </div>
    </div>

 


    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->



</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>



</main>

  </body>
  <script type="text/javascript" src="jsTallaPeso/jquery-1.11.3.min.js"></script> 
  <script src="dist/js/bootstrap.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!---------iconv_strpos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</html>



