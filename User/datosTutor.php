<!-----si ------------------------------------------------------------>
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

  $consulta2 = "SELECT * FROM usuarios WHERE usuario='$usuario'";
  $resultado2 = $conexion->prepare($consulta2);
  $resultado2->execute();
  $row2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
  

                        foreach($row2 as $row2){
                    
  
                        }
        
// Obtener el valor de $row2['usuario']
$row2_usuario = $row2['id_usuario'];

// Asignar el valor a $_SESSION['usuario']
$_SESSION['id_usuario'] = $row2_usuario;

// Asignar el valor a $usuario
$id_usuario = $_SESSION['id_usuario'];


                        $consulta3 = "SELECT * FROM tutor WHERE id_usuario='$id_usuario'";
                        $resultado3 = $conexion->prepare($consulta3);
                        $resultado3->execute();
                        $row3=$resultado3->fetchAll(PDO::FETCH_ASSOC);
                        
                      
                                              foreach($row3 as $row3){
                                          
                                                $row3['id_tutor'];   
                                              }
                                              $row3_id_tutor = $row3['id_tutor'];

                                              // Asignar el valor a $_SESSION['usuario']
                                              $_SESSION['id_tutor'] = $row3_id_tutor;
                                              
                                              // Asignar el valor a $usuario
                                              $id_tutor =$_SESSION['id_tutor'];

$consulta4 = "SELECT * FROM menor WHERE id_tutor='$id_tutor'";
$resultado4 = $conexion->prepare($consulta4);
$resultado4->execute();
$row4=$resultado4->fetchAll(PDO::FETCH_ASSOC);


                      foreach($row4 as $row4){
                  

                      }
                    // Obtener el valor de $row2['usuario']
$row4_usuario = $row4['no_hijos'];

// Asignar el valor a $_SESSION['usuario']
$_SESSION['no_hijos'] = $row4_usuario;

// Asignar el valor a $usuario
$no_hijos = $_SESSION['no_hijos'];
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
              <a class="nav-link active blue-box" href="#">Datos Personale</a>
            </li>
            <li class="nav__item">
            <a class="nav-link" href="../cerrarSesion.php">Cerrar Sesión</a>
            </li>
           
       
      </ul>
    </div>
  </div>
</nav>

<!-- Begin page content -->


<!-- /Content Section --> 
</br>
                      </br>
                      </br>
  <?php
                          if ( $row3['id_usuario'] =="" ){
                            include ('datosTutorDB.php');
                            
                            
                          }
                          
                          else{

                            include ('completoDatos.php');
                           if ($row3['no_hijos'] == $row4['no_hijos']) {
                              // hacer algo si hay hijos
                              
                            } else{
                              include ('hijosBD.php');
                            }
                          }
                       
                           ?>
                      
<!-- // Modal --> 
<!-- Jquery JS file --> 
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<!---------<script type="text/javascript" src="js/mostrar_hijos.js"></script> 
<!-- Fin crud jquery-->



      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>


<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 

<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>