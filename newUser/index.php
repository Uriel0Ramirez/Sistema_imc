<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Nuevo Usuario</title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"></head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar bg-primary" data-bs-theme="dark">
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
     <!--- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap--->
    </a>
    <span class="navbar-text">
        
      </span>
  </div>
</nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 >Crear Nueva Cuenta</h3>
  <a type="button" class="btn btn-warning" href="../index.php">Regresar</a>

  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->

      
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
       
      
      </div>
      
      
      
      <div class="modal-body">
      <div class="row" id="oplogin">
     
                 
                  

                    </div>
                   
                           
        <div class="form-group">
          <label for="Cod ALumno">Correo Electronico</label>
          <input type="text" id="Usuario" value=""   class="form-control"/>
        </div>
        <div class="form-group">
          <label for="CodMatri">Nueva Contraseña</label>
          <input type="password" id="Contraseña" class="form-control" value=""/>
        </div>
        <div class="form-group">
          <label for="Observacion">Nueva Contraseña</label>
          <!------codigo de palabraas en mayusculas---->
         <!-- <textarea style="text-transform:uppercase" id="newContraseña" class="form-control"></textarea>-->
          <input type="password"id="newContraseña" class="form-control"/>
        </div>
      </div>
  
       
        <button type="button" class="btn btn-primary" onclick="addRecord()">Agregar</button>
   
   
  </div>

<!-- // Modal --> 
</div>
<!-- // Modal --> 
<!-- Jquery JS file --> 
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="js/adduser.js"></script> 
<!-- Script para notificaciones-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 

<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>