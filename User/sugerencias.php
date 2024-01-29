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


 
  $id_menor = $_SESSION['id_menor'];

  $consulta2 = "SELECT * FROM menor WHERE id_menor='$id_menor'";
  $resultado2 = $conexion->prepare($consulta2);
  $resultado2->execute();
  $row2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
  

                        foreach($row2 as $row2){
                    
  
                        }
                        $consulta3 = "SELECT * FROM imc_menor WHERE id_menor='$id_menor'";
                        $resultado3 = $conexion->prepare($consulta3);
                        $resultado3->execute();
                        $row3=$resultado3->fetchAll(PDO::FETCH_ASSOC);
                        
                      
                                              foreach($row3 as $row3){
                                          
                        
                                              }

                      //echo $_SESSION['id_tutor']; 

                    
                    ?>
                     <?php  $row2['edad'];  ?>
                   
                 
                 
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Sugerrencias</title>

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="css/style.css">
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
            <a class="nav-link"href="tutelado.php">Inicio</a>
            </li>
            <li class="nav__item">
            <a class="nav-link" href="TallaPeso.php">Peso y Talla</a>
            </li>
            <li class="nav__item">
            <a class="nav-link" href="Vacunas.php">Vacunas</a>
            </li>
            <li class="nav__item">
              <a class="nav-link  active blue-box" href="#">Sugerencias</a>
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

</br>
                      </br>
                      </br>
<div class="container">
                       <?php     include ('./ajaxTallaPeso/sugerencias_ajax.php');  ?>
                            
                       
</div>

</main>

  </body>
  <script type="text/javascript" src="jsTallaPeso/jquery-1.11.3.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!---------iconv_strpos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</html>


