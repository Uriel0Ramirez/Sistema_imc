
<!-- /Content Section --> 

<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="background: rgb(79,116,117);
background: radial-gradient(circle, rgba(79,116,117,1) 0%, rgba(115,139,167,1) 100%);">
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title">Agregar información</h5>
    </div>
    <br>   
    <div class="modal-body">
      <div class="form-group row">
        <label for="id_alumno" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-4">
          <input type="text" id="nombre" value="" class="form-control">
        </div>
        <label for="Cod ALumno" class="col-sm-2 col-form-label">Apellido Materno</label>
        <div class="col-sm-4">
          <input type="text" id="apellido_p" value="" class="form-control">
        </div>
      </div>
      <br>   
      <div class="form-group row">
        <label for="CodMatri" class="col-sm-2 col-form-label">Apellido Paterno</label>
        <div class="col-sm-4">
          <input type="text" id="apellido_m" class="form-control" value="">
        </div>
        <label for="CodMatri" class="col-sm-2 col-form-label">Edad</label>
        <div class="col-sm-4">
          <input type="text" id="edadt"  value="" class="form-control" onkeypress="return validarNumero(event)"/>
        </div>
      </div>
<br>    
<div class="form-group row">
        <label for="parentesco_tutor" class="col-sm-4 col-form-label">Numeros de menores que dispondran del sistema</label>
        <div class="col-sm-8">
          <select name="parentesco" id="no_hijos" class="form-control">
            <option value="">Seleccionar</option>
            <option value="1">1 Integrantes</option>
            <option value="2">2 Integrantes</option>
            <option value="3">3 Integrantes</option>
            <option value="4">4 Integrantes</option>
            <option value="5">5 Integrantes</option>
          </select>
        </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>"> 
    <hr>



</div>

   
   
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" onclick="addRecord()">Agregar</button>
        <br>
        <br>
      </div>
    </div>
    <br>
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
        <div class="form-group">
          <label for="idalumno">Cod. Alumno</label>
          <input type="text" id="update_idalumno" value="" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="codalumno">Cod. Alumno</label>
          <input type="text" id="update_codalumno" placeholder="Last Name" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="obs">Observaciones</label>
          <textarea style="text-transform:uppercase" id="update_obs" class="form-control"></textarea>
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
<script type="text/javascript" src="js/addtut2.js"></script> 
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script>
  function validarNumero(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>
</body>
</html>