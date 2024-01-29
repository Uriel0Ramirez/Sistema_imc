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


  $usuario=$_SESSION['usuario'];

  $consulta2 = "SELECT * FROM misdatos WHERE id_usuario='$usuario'";
  $resultado2 = $conexion->prepare($consulta2);
  $resultado2->execute();
  $row2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
  

                        foreach($row2 as $row2){
                    
  
                        }
                    
                    ?>
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Datos Personale</title>

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">
 
  </head>
  <body>
    
<main>
  
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">MI HISTORIAL DEL CRECIMIENTO Y PESO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
           <li class="nav__item">
            <a class="nav-link"href="home.php">Inicio</a>
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
            
            <li class="nav__item">
            <a class="nav-link active blue-box" href="#">Datos Personale</a>
            </li>
           
   

      <li class="nav__item dropdown">
    <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Opciones de Cuenta</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item"  href="miCuenta.php">Mi Cuenta</a></li>
    
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="../cerrarSesion.php">Cerrar Sesión</a></li>
    </ul>
  </li>

      </ul>
    </div>
  </div>




</nav> 
                      </br>
                      </br>
                      </br>
  <?php
                          if ( $row2['id_usuario'] =="" ){
                            include ('infoDatos.php');
                            
                            
                          }
                          else{

                            include ('completoDatos.php');
                            
                          }
                       
                           ?>
                      

</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
