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

  $consulta2 = "SELECT * FROM userlocal WHERE usuario='$usuario'";
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
            <a class="nav-link" href="TallaPeso.php">Peso y Talla</a>
            </li>
            <li class="nav__item">
            <a class="nav-link" href="Vacunas.php">Vacunas</a>
            </li>
            <li class="nav__item">
              <a class="nav-link" href="sugerencias.php">Sugerencias</a>
            </li>
            
            <li class="nav__item">
            <a class="nav-link" href="misDatos.php">Datos Personale</a>
            </li>
           
   

            <li class="nav__item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones de Cuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="miCuenta.php">Mi Cuenta</a>
       
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../cerrarSesion.php">Cerrar Sesión</a>
        </div>
      </li>

      </ul>
    </div>
  </div>




</nav> 

  <div class="container my-5">

  </div>
</main>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">MI CUENTA</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
      
      
<!-- Content Section --> 
<!-- crud jquery-->
<div class="da">
  <div class="row">
    <div class="col-md-12">
      <div class="pull-right">
       
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div id="records_content"></div>
    </div>
  </div>
</div>
<!-- /Content Section --> 

<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Agregar comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      
      <div class="modal-body">
        <div class="form-group">
          <label for="id_alumno">Id Alumno</label>
          <input  type="text" id="idalumno" value=""  class="form-control"/>
        </div>
        <div class="form-group">
          <label for="Cod ALumno">Cod. Alumno</label>
          <input type="text" id="codalumno" value=""   class="form-control"/>
        </div>
        <div class="form-group">
          <label for="CodMatri">Cod. Matri</label>
          <input type="text" id="codmatri" class="form-control" value=""/>
        </div>
        <div class="form-group">
          <label for="Observacion">Observacion</label>
          <textarea style="text-transform:uppercase" id="obs" class="form-control"></textarea>
          <!--<input type="text" id="obs" class="form-control"/>--> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="addRecord()">Agregar</button>
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      
      
      <div class="modal-body">
        <!----
        <div class="form-group">
          <label for="idalumno">Nombre</label><?php //echo $row2['Nombre']?>
          <input type="text" id="update_idalumno" value="" class="form-control"/>
        </div>
        --->
        <div class="form-group">
          <label for="codalumno">Usuario</label>
          <input type="text" disabled id="obs" value="<?php echo $_SESSION['usuario']?>" class="form-control"/>
 
        </div>
        <div class="form-group">
          <label for="obs">Nueva Contraseña</label>
          <input type="password" id="update_pass" placeholder="Nueva Contraseña" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="obs">Nueva Contraseña</label>
          <input type="password" id="update_pass2" placeholder="Repetir Contraseña" class="form-control"/>
         <!-- <input type="passworrd" id="update_obs" placeholder="Repetir Contraseña" class="form-control"/>--->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Guardar Cambios</button>
        <input type="hidden" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 
<!-- Jquery JS file --> 
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="jsCuenta/script111.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Fin crud jquery-->



      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 

<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>