
<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">HISTORIAL DE VACUNAS</h3>
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
        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Agregar Nueva Registro</button>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
  include_once '../encargado/assets/conexion-tabla.php';
  
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();
  
  
  $consulta = "SELECT * FROM  bd_vacunas";
  $resultado3 = $conexion->prepare($consulta);
  $resultado3->execute();
  $row3=$resultado3->fetchAll(PDO::FETCH_ASSOC);
  
  
?> 
      <div class="container">
        <form class="row g-3">
          <div class="col-md-12">
            <div class="input-group flex-nowrap">
              <label class="input-group-text" for="inputGroupSelect01">Vacuna</label>
              <select class="form-select" id="vacuna">              
                <?php foreach($row3 as $row3): ?>
                           <option value="<?php echo $row3['nombre']?>"><?php echo $row3['nombre']?></option>
     
                           <?php endforeach ?>
                         </select>
              <span class="input-group-text" id="addon-wrapping">Otras</span>
              <input type="text" class="form-control" id="vacunas_otras" value="" placeholder="Especificar" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
          </div>
</br></br>

          <div class="col-md-12">
           <div class="input-group flex-nowrap">
           <label class="input-group-text"  for="inputGroupSelect01"> DOSIS</label>
          <select class="form-select" id="dosis">
            <option selected></option>
            <option value="PRIMERA">PRIMERA</option>
            <option value="SEGUNDA">SEGUNDA</option>
            <option value="TERCERA">TERCERA</option>
            <option value="REFUERZO">REFUERZO</option>
            
           </select>
           
           
           <?php
            $edad = $row2['edad'];

switch ($edad) {
    case 1:
      ?>
       <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
  <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
    <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
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
 <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
                      <option selected></option>
                                <option value="10">10 Años</option>
                                <option value="11">11 Años</option>
                                <option value="12">12 Años</option>
                            
                      </select>
                      <?php
                      break;
                      case 11:
                        ?>
                <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
                        <option selected></option>
                                  <option value="11">11 Años</option>
                                  <option value="12">12 Años</option>
                              
                        </select>
                        <?php
                        break;
                        case 12:
                          ?>
      <label class="input-group-text"  for="inputGroupSelect01">EDAD</label>
          <select class="form-select" id="edadVacuna">
                          <option selected></option>
                                    <option value="12">12 Años</option>
                                
                          </select>
                          <?php
                          break;
    default:
        echo "No se ha especificado la edad";
}

          ?>
    

</div>  <input type="hidden" id="id_usuarioVacunas" value="<?php echo $_SESSION['id_menor']?>"> 

</div> 

        </form>
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
<script type="text/javascript" src="jsVacuna/scriptV6.js"></script> 
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

