

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
    <title>Document</title>
    
</head>
<body>
<div class="container text-center">

<div class="alert alert-success" role="alert">


   
  <p></p>
      <hr>
  <div class="row">
    <div class="col-md-12">
      <div id="records_content"></div>
    </div>
  </div>
</div> 
</div>
</div> 

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
        <input id="update_nombre" value="" class="form-control"/>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="codalumno">Apellido Paterno</label>
        <input  id="update_apellido_p"  class="form-control"/>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="codalumno">Apellido Materno</label>
        <input  id="update_apellido_m"  class="form-control"/>
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
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="js/scriptV50.js"></script> 
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="jsTallaPeso/jquery-1.11.3.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>