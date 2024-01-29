<!-----si ------------------------------------------------------------>


<style>
    #resultado{
      display: none;
    }
      </style>
       <div id="resultado">
      <?php include ('completoDatos.php');?>
      </div><!doctype html>


      <main id="perfilform" >

  
<!-- Content Section --> 
<!-- crud jquery-->
<div class="container">


<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->

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
        <label for="parentesco_tutor" class="col-sm-2 col-form-label">Parentesco</label>
        <div class="col-sm-4">
          <select name="parentesco" id="parentesco" class="form-control">
            <option value="">Seleccione el parentesco</option>
            <option value="padre">Padre</option>
            <option value="madre">Madre</option>
            <option value="hermano">Hermano/a</option>
            <option value="abuelo">Abuelo/a</option>
            <option value="tio">Tío/a</option>
          </select>
        </div>
        <label for="parentesco_tutor" class="col-sm-2 col-form-label">Nomeros de menores que dispondran del sistema</label>
        <div class="col-sm-4">
          <select name="parentesco" id="no_hijos" class="form-control">
            <option value="">Seleccionar</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      </div>
    </div>
    <hr>

<div class="col-sm-12">
                             
                                    </div>

                                    <div class="col-lg-12" style="padding-top: 8px;">
                                        <div class="card">
                                            <div class="card-header">
                                                DIRECCION
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                        <label for="">Codigo Postal</label>
                                                        <input type="text" class="js-example-basic-single" name="codiopostal" id="sel_departamento" style="width:100%">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="sel_provincia">Municipio</label>
                                                            <select  disabled class="form-control js-example-basic-single" name="state" id="sel_provincia" style="width: 100%"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="sel_distrito">Localidad</label>
                                                            <select class="form-control js-example-basic-single" name="state" id="sel_distrito" style="width: 100%"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>"> 
                                               
                                            </div>
  </div>
</div>

   
   
      <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" onclick="addRecordAndGuardar()" name="finish" value="GUARDRA DATOS" />
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


<script>
  function addRecordAndGuardar() {

    guardar();
  }
</script>
<script>
  function validarNumero(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->


<!-- Bootstrap core JavaScript


<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>

</html>

        
</html>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="jscp/BDtutor2.js"></script>
    <script>
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            listar_departamento();
        
        });

        $("#sel_departamento").change(function(){
            var iddepartamento = $("#sel_departamento").val();
            listar_pronvincia(iddepartamento);
        })

        $("#sel_provincia").change(function(){
            var idprovincia = $("#sel_provincia").val();
            listar_distrito(idprovincia);
        })
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
