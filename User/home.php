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
            <a class="nav-link active blue-box"href="#">Inicio</a>
            </li>
           
           
           
            
            <li class="nav__item">
              <a class="nav-link" href="datosTutor.php">Datos Personale</a>
            </li>

            <li class="nav__item">
            <a class="nav-link" href="../cerrarSesion.php">Cerrar Sesión</a>
            </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">LISTA DE TUTELADOS</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
      
 
  <br>
  <div class="row">
    <div class="col-md-12">
      <div id="records_content"></div>
    </div>
  </div>
</div>
<!-- /Content Section --> 

<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar</h5>
      
      </div> 
      
      
      <div class="modal-body">
  <center><h4>DATOS DEL TUTOR</h4></center>
  <hr>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="idalumno">Nombre</label>
        <input  id="update_nombre" value="" class="form-control"/>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="codalumno">Apellido Paterno</label>
        <input  id="update_apellido_p" placeholder="Last Name" class="form-control"/>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="codalumno">Apellido Materno</label>
        <input id="update_apellido_m" placeholder="Last Name" class="form-control"/>
      </div>
    </div>
  </div>
  <hr>
  <!---------------
  <center><h4>DATOS DEL MENOR</h4></center>
  <hr>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="idalumno">Nombre</label>
        <input style="text-transform:uppercase" id="update_NombreMenor" value="" class="form-control"/>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="codalumno">Apellido Paterno</label>
        <input style="text-transform:uppercase" id="update_ApellidoPaterno_Menor" placeholder="Last Name" class="form-control"/>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="codalumno">Apellido Materno</label>
        <input style="text-transform:uppercase" id="update_ApellidoMaterno_Menor" placeholder="Last Name" class="form-control"/>
      </div>
    </div>
  </div>
  <hr>
</div>
---->
      <div class="modal-footer">
      <button type="button" id="close_modal_button" class="btn btn-default" >Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Guardar Cambios</button>
        <input type="hidden" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>
<script>
  // Obtener referencia al botón de cerrar modal
var closeButton = document.getElementById("close_modal_button");

// Agregar evento de clic al botón
closeButton.addEventListener("click", function() {
  // Cerrar la modal
  $('#update_user_modal').modal('hide');
});

  </script>
<!-- // Modal --> 
<!-- Jquery JS file --> 
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="js/mostrar_hijos3.js"></script> 
<!-- Fin crud jquery-->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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