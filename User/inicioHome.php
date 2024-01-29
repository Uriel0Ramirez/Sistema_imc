
<!-- Begin page content -->

<div class="container">

  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
      
      
<!-- Content Section --> 
<!-- crud jquery-->
<div class="da">
  <div class="row">
    <div class="col-md-12">
     
    </div>
  </div>
  <br>
 
</div>
<!-- /Content Section --> 

<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      
      <div class="modal-body">
        <div class="form-group">
          <label for="id_alumno">Talla</label>
          <input type="text" id="talla" value=""  placeholder="unidad en centimetros" class="form-control" onkeypress="return validarNumero(event)"/>
         
        </div>
        <div class="form-group">
          <label for="Cod ALumno">Peso</label>
          <input type="text" id="peso" class="form-control" onkeypress="return validarNumero(event)"/>
        </div>

        <script>
  function validarNumero(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>
</br>
        <div class="input-group mb-12"> 
          <?php
            $edad = $row2['edad'];

switch ($edad) {
    case 1:
      ?>
      <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
      <select class="form-select col-5" id="edad2">
      <option selected></option>
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
      <?php
        break;
    case 2:
      ?>
      <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
      <select class="form-select col-5" id="edad2">
      <option selected></option>
                <option value="2">2 Años</option>
                <option value="2.6">2 Años 6 Meses</option>
                <option value="3">3 Años</option>
                <option value="3.6">3 Años 6 mese</option>
                <option value="4">4 Años</option>
                <option value="4.6">4 Años 6 Meses</option>
                <option value="5">5 Años</option>
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
                <option value="11">11 Año</option>
                <option value="12">12 Años</option>
            
      </select>
      <?php
        break;
    case 3:
      ?>
      <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
      <select class="form-select col-5" id="edad2">
      <option selected></option>
                <option value="3">3 Año</option>
                <option value="3.6">3 Años 6 mese</option>
                <option value="4">4 Años</option>
                <option value="4.6">4 Años 6 Meses</option>
                <option value="5">5 Años</option>
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
      <?php
        break;
        case 4:
          ?>
          <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
          <select class="form-select col-5" id="edad2">
          <option selected></option>
                    <option value="4">4 Años</option>
                    <option value="4.6">4 Años 6 Meses</option>
                    <option value="5">5 Año</option>
                    <option value="5.6">5 Años 6 mese</option>
                    <option value="6">6 Años</option>
                    <option value="6.6">6 Años 6 Meses</option>
      
                    <option value="7">7 Año</option>
                    <option value="7.6">7 Años 6 mese</option>
                    <option value="8">8 Años</option>
                    <option value="8.6">8 Años 6 Meses</option>
                    <option value="9">9 Año</option>
                    <option value="9.6">9 Años 6 mese</option>
                    <option value="10">10 Años</option>
                    <option value="11">11 Años</option>
                    <option value="12">12 Años</option>
                
          </select>
          <?php
          break;
          case 5:
            ?>
            <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
            <select class="form-select col-5" id="edad2">
            <option selected></option>
                      <option value="5">5 Año</option>
                      <option value="5.6">5 Años 6 mese</option>
                      <option value="6">6 Años</option>
                      <option value="6.6">6 Años 6 Meses</option>
        
                      <option value="7">7 Año</option>
                      <option value="7.6">7 Años 6 mese</option>
                      <option value="8">8 Años</option>
                      <option value="8.6">8 Años 6 Meses</option>
                      <option value="9">9 Año</option>
                      <option value="9.6">9 Años 6 mese</option>
                      <option value="10">10 Años</option>
                      <option value="11">11 Años</option>
                      <option value="12">12 Años</option>
                  
            </select>
            <?php
            break;
            case 6:
              ?>
              <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
              <select class="form-select col-5" id="edad2">
              <option selected></option>
                        <option value="6">6 Años</option>
                        <option value="6.6">6 Años 6 Meses</option>
          
                        <option value="7">7 Año</option>
                        <option value="7.6">7 Años 6 mese</option>
                        <option value="8">8 Años</option>
                        <option value="8.6">8 Años 6 Meses</option>
                        <option value="9">9 Año</option>
                        <option value="9.6">9 Años 6 mese</option>
                        <option value="10">10 Años</option>
                        <option value="11">11 Años</option>
                        <option value="12">12 Años</option>
                    
              </select>
              <?php
              break;
              case 7:
                ?>
                <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
                <select class="form-select col-5" id="edad2">
                <option selected></option>
                          <option value="7">7 Año</option>
                          <option value="7.6">7 Años 6 mese</option>
                          <option value="8">8 Años</option>
                          <option value="8.6">8 Años 6 Meses</option>
                          <option value="9">9 Año</option>
                          <option value="9.6">9 Años 6 mese</option>
                          <option value="10">10 Años</option>
                          <option value="11">11 Años</option>
                          <option value="12">12 Años</option>
                      
                </select>
                <?php
                break;
                case 8:
                  ?>
                  <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
                  <select class="form-select col-5" id="edad2">
                  <option selected></option>
                            <option value="8">8 Años</option>
                            <option value="8.6">8 Años 6 Meses</option>
                            <option value="9">9 Año</option>
                            <option value="9.6">9 Años 6 mese</option>
                            <option value="10">10 Años</option>
                            <option value="11">11 Años</option>
                            <option value="12">12 Años</option>
                        
                  </select>
                  <?php
                  break;
                  case 9:
                    ?>
                    <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
                    <select class="form-select col-5" id="edad2">
                    <option selected></option>
                              <option value="9">9 Año</option>
                              <option value="9.6">9 Años 6 mese</option>
                              <option value="10">10 Años</option>
                              <option value="11">11 Años</option>
                              <option value="12">12 Años</option>
                          
                    </select>
                    <?php
                    break;
                    case 10:
                      ?>
                      <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
                      <select class="form-select col-5" id="edad2">
                      <option selected></option>
                                <option value="10">10 Años</option>
                                <option value="11">11 Años</option>
                                <option value="12">12 Años</option>
                            
                      </select>
                      <?php
                      break;
                      case 11:
                        ?>
                        <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
                        <select class="form-select col-5" id="edad2">
                        <option selected></option>
                                  <option value="11">11 Años</option>
                                  <option value="12">12 Años</option>
                              
                        </select>
                        <?php
                        break;
                        case 12:
                          ?>
                          <label class="input-group-text col-7"  for="inputGroupSelect01">Edad</label>
                          <select class="form-select col-5" id="edad2">
                          <option selected></option>
                                    <option value="12">12 Años</option>
                                
                          </select>
                          <?php
                          break;
    default:
        echo "No se ha especificado la edad";
}

          ?>
    
        </div>

      
        <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['id_menor']?>"> 
      
      </div>
      <!---
      <script>
    var modal = document.getElementById('add_new_record_modal'); // Reemplaza 'tuModal' por el ID de tu modal

    modal.addEventListener('show.bs.modal', function (event) {
        var agregarBtn = document.getElementById("agregarBtn");
        agregarBtn.disabled = true;
    });
  
    function validarTalla() {
        var tallaInput = document.getElementById("talla");
        var talla = parseFloat(tallaInput.value);
        var agregarBtn = document.getElementById("agregarBtn");
        
        if (!isNaN(talla)) {
            var tallaMetros = talla / 100;
            tallaInput.value = tallaMetros.toFixed(2);
            agregarBtn.disabled = false;
        } else {
            tallaInput.value = "";
            agregarBtn.disabled = true;
        }
    }
</script>
<button type="button" class="btn btn-primary" onclick="validarTalla()">Validar</button>-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="validarDatos()">Agregar</button>
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
<script type="text/javascript" src="jsTallaPeso/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="jsTallaPeso/tiempov4_3.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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





<div class="row g-12">
  <div class="col-md-12">
    <CENTER>
    <h2>CRECIMIENTO Y PESO </h2>
</CENTER>
   <!-- <p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p> --->
    
   <!-- <h3> <small class="text-muted"><?php //echo $row2['nombre'] ?> <?php //echo $row2['apellidoPater_menor'] ?></small></h3>--->
    <ul class="icon-list ps-0">
    
      <li class="text-muted d-flex align-items-start mb-1">Estado de Nutricion</li>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </ul>

 
                       <?php
                          if ( $row3['id_menor'] =="" ){
                            include ('DatosNoAgregados.php');
                          }
                          else{
                            ?>
                               <div id="records_content2"></div>
                            <?php
                          }
                       
                           ?>
   
   
  </div>

  <div class="col-md-12">
    <h2>Historial de Tall y Peso</h2>
   <!-- <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>-->
    <ul class="icon-list ps-0">
    <div class="pull-right">
        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Agregar nuevos datos</button>
      </div>
</br>
    <div id="records_content"></div>


    </ul>
  </div>

</div>

</main>
</div>