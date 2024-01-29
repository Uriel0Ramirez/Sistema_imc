<!-----si ------------------------------------------------------------>
<!-- Content Section --> 
<!-- crud jquery-->
<div class="container" style="background: rgb(79,116,117);
background: radial-gradient(circle, rgba(79,116,117,1) 0%, rgba(115,139,167,1) 100%);">

<hr>
<center>
<H1>INFORMACION DEL MENOR</H1>
</center>

<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->

<div class="modal-dialog" role="document">
  <div class="modal-content">

  
    <div class="modal-header">
    
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
        
      </div>
<br>    
      <div class="form-group row">


        <label for="parentesco_tutor" class="col-sm-2 col-form-label">Edad</label>
        <div class="col-sm-4">
          <select name="parentesco" id="edadm" class="form-control">
          <option value="1">1 Año</option>
                <option value="1.6">1 Años 6 mese</option>
                <option value="2">2 Años</option>
                <option value="2.6">2 Años 6 Meses</option>
                <option value="3">3 Año</option>
                <option value="3.6">3 Años 6 mese</option>
                <option value="4">4 Años</option>
                <option value="4.6">4 Año 6 Meses</option>
                <option value="5">5 Año</option>
                <option value="5.6">5 Años 6 mese</option>
                <option value="6">6 Años</option>
                <option value="6.6">6 Años 6 Meses</option>
  
                <option value="7">7 Años</option>
                <option value="7.6">7 Años 6 mese</option>
                <option value="8">8 Años</option>
                <option value="8.6">8 Años 6 Meses</option>
                <option value="9">9 Años</option>
                <option value="9.6">9 Años 6 mese</option>
                <option value="10">10 Años</option>
                <option value="11">11 Años</option>
                <option value="12">12 Años</option>
          </select>
        </div>
        <label for="parentesco_tutor" class="col-sm-2 col-form-label">Sexo</label>
        <div class="col-sm-4">
          <select name="parentesco" id="sexo" class="form-control">
            <option value="">Seleccionar</option>
            <option value="1">Hombre</option>
            <option value="2">Mujer</option>
          </select>
        </div>
      </div>
      <?php
switch ($_SESSION['no_hijos']) {
    case "":
        $_SESSION['no_hijos'] = 1;
        break;
    case 1:
        $_SESSION['no_hijos'] = 2;
        break;
    case 2:
        $_SESSION['no_hijos'] = 3;
        break;
    case 3:
        $_SESSION['no_hijos'] = 4;
        break;
    case 4:
        $_SESSION['no_hijos'] = 5;
        break;
    default:
        break;
}

echo '<input type="hidden" id="no_hijos" value="' .$_SESSION['no_hijos']. '">';
?>



         
        
    </div>
    <hr>

<div class="col-sm-12">
          

  <input type="hidden" id="id_tutor" value="<?php echo $_SESSION['id_tutor']?>"> 
                                               
                                            </div>
  </div>
</div>

   
   
<button type="button" class="btn btn-primary" onclick="addRecordm()">Agregar</button>
<br>
<br>
      </div>
    </div>
  </div>
</div>

<br>
<br>
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
<script type="text/javascript" src="js/addmenor2.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function addRecordAndGuardar() {

    guardar();
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
    