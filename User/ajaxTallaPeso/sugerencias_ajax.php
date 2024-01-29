<?php
	// include Database connection file 

	include("conexion.php");

	// Variable sesion
  session_start(); 						
	
  $id_menor = $_SESSION['id_menor'];
						
  $query = "SELECT * FROM imc_menor WHERE id_menor='$id_menor'";
if (!$result = mysqli_query($con, $query)) {
exit(mysqli_error($con));
}
// if query results contains rows then featch those rows 
if(mysqli_num_rows($result) > 0)
{
//validar varibales
$number = 1;
$talla = "";
$peso = "";
$edads = "";
$tallaCal = "";
$pesoCal = "";
$edadsCal = "";

while($row = mysqli_fetch_assoc($result))
{

$talla.=''.$row['talla'].',';
$peso.=''.$row['peso'].',';
$edads.=''.$row['edad_imc'].',';        
$number++;
$tallaCal=''.$row['talla'].'';
$pesoCal=''.$row['peso'].'';
$edadsCal=''.$row['edad_imc'].'';
}
}
else
{


}
//echo $a1=$data
// echo $tallaCal;
$query = "SELECT * FROM menor WHERE id_menor='$id_menor'";
if (!$result = mysqli_query($con, $query)) {
exit(mysqli_error($con));
}
// if query results contains rows then featch those rows 
if(mysqli_num_rows($result) > 0)
{
$number = 1;


while($row = mysqli_fetch_assoc($result))
{          
 $sexo=''.$row['sexo'].'';
 $number++;
}
}


  
//Sexo hombre
if($sexo=="1"){
  $imch="";
$sumaTalla="";
// Formula para calcular el Imc en niñas
$sumaTalla = $tallaCal*$tallaCal;
$imch=$pesoCal/ $sumaTalla;
//dependiendo de sus edad 7*
$calcular = $edadsCal;

$VariableTallaBajaMENOR='<div class="alert alert-danger" role="alert"><i class="bi bi-person-exclamation" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Estatura. <strong>Bajo !</strong> <a href="#" class="alert-link"></a></div>';
$VariableTallaNormalMENOR='<div class="alert alert-primary" role="alert"><i class="bi bi-person-fill-check" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Estatura. <strong>Normal !</strong> <a href="#" class="alert-link"></a></div>';

// vaiable peso
$VariablePesoNormalMenor='<div class="alert alert-primary" role="alert"><i class="bi bi-shield-shaded" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Saludable !</strong><a href="#" class="alert-link"></a></div>';
$VariablePesoBajoMenor='<div class="alert alert-warning" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Bajo !</strong> <a href="#" class="alert-link"></a></div>';
$VariablePesoObesidadMenor='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Sobrepeso !</strong> <a href="#" class="alert-link"></a></div>';
$VariablePesoObesidadMasMenor='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Obesidad !</strong> <a href="#" class="alert-link"></a></div>';



//OPCIONES DE 7 AÑOS EN ADELANTE
$VariableBajoPeso='<div class="alert alert-danger" role="alert"> <i class="bi bi-exclamation-square-fill"></i> Bajo de Peso</div>';
$VariableBajoPeso='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem;"></i> <h4>¡Estado de Nutricion. <strong>Bajo de Peso !</strong></h4> <a href="#" class="alert-link"></a></div>';

$VariableBajoRiesgo='<div class="alert alert-warning" role="alert"><i class="bi bi-shield-fill-exclamation" style="font-size: 2rem;"></i> <h4>¡Estado de Nutricion. <strong>En riesgos de desnutricion !</strong></h4> <a href="#" class="alert-link"></a></div>';
$VariablePesoNormal='<div class="alert alert-primary" role="alert"><i class="bi bi-shield-shaded" style="font-size: 2rem;"></i> <h4>¡Estado de Nutricion. <strong>Saludable !</strong></h4> <a href="#" class="alert-link"></a></div>';
$VariableSobrepesoRiesgo='<div class="alert alert-warning"  role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Nutricion. <strong>En riesgo de sobrepeso !</strong> <a href="#" class="alert-link"></a></div>';
$VariableSobrepeso='<div class="alert alert-warning"  role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Nutricion. <strong>Sobrepeso !</strong> <a href="#" class="alert-link"></a></div>';
$VariableObesidad='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Nutricion. <strong>Obesidad !</strong> <a href="#" class="alert-link"></a></div>';



switch ($calcular) {
  case "1":
    if ($tallaCal <= .73) {
     echo $VariableTallaBajaMENOR;
     include('Sugerencias/TallaBajaMENOR2.php');
     }
     if ($tallaCal >= .74 && $tallaCal <= .80) {
     echo $VariableTallaNormalMENOR; 
     include('Sugerencias/TallaNormalMENOR.php');

     }
     if ($pesoCal <= 8.6) {
      echo $VariablePesoBajoMenor;
      include('Sugerencias/PesoBajoMenor.php');
    }
     if ($pesoCal >= 8.7 && $pesoCal <= 10.7) {
       echo $VariablePesoNormalMenor;
       include('Sugerencias/PesoNormalMenor.php');
       
     }
     
     if ($pesoCal >= 10.8) {
       
       if ($pesoCal >= 12) {
        echo $VariablePesoObesidadMasMenor;
      }
      echo $VariablePesoObesidadMenor;
      include('Sugerencias/PesoBajoMenor.php');
     }
    
           break;
           case "1.6":
            if ($tallaCal <= .79) {
             echo $VariableTallaBajaMENOR;
             include('Sugerencias/TallaBajaMENOR2.php');
             }
             if ($tallaCal >= .80 && $tallaCal <= .89) {
             echo $VariableTallaNormalMENOR; 
             include('Sugerencias/TallaNormalMENOR.php');
             }
             if ($pesoCal <= 9.8) {
              echo $VariablePesoBajoMenor;
              include('Sugerencias/PesoBajoMenor.php');
         
            }
             if ($pesoCal >= 9.9 && $pesoCal <= 12.2) {
               echo $VariablePesoNormalMenor;
               include('Sugerencias/PesoNormalMenor.php');
             }
             
             if ($pesoCal >= 12.3) {
              if ($pesoCal >= 13.7) {
                echo $VariablePesoObesidadMasMenor;
              }
               echo $VariablePesoObesidadMenor;
               include('Sugerencias/PesoBajoMenor.php');
             }
             
                   break;
                   case "2":
                    if ($tallaCal <= .84) {
                     echo $VariableTallaBajaMENOR;
                     include('Sugerencias/TallaBajaMENOR2.php');
                     }
                     if ($tallaCal >= .85 && $tallaCal <= .95) {
                     echo $VariableTallaNormalMENOR; 
                     include('Sugerencias/TallaNormalMENOR.php');
                     }
                     if ($pesoCal <= 10.8) {
                      echo $VariablePesoBajoMenor;
                      include('Sugerencias/PesoBajoMenor.php');
                 
                    }
                     if ($pesoCal >= 10.9 && $pesoCal <= 13.6) {
                       echo $VariablePesoNormalMenor;
                       include('Sugerencias/PesoNormalMenor.php');
                     }
                     
                     if ($pesoCal >= 13.7) {
                      if ($pesoCal >= 15.3) {
                        echo $VariablePesoObesidadMasMenor;
                      }
                       echo $VariablePesoObesidadMenor;
                       include('Sugerencias/PesoBajoMenor.php');
                     }
                    
                           break;
                           case "2.6":
                            if ($tallaCal <= .88) {
                             echo $VariableTallaBajaMENOR;
                             include('Sugerencias/TallaBajaMENOR52.php');
                             }
                             if ($tallaCal >= .88 && $tallaCal <= 1.12) {
                             echo $VariableTallaNormalMENOR; 
                             include('Sugerencias/TallaNormalMENOR.php');
                             }
                             if ($pesoCal <= 11.8) {
                              echo $VariablePesoBajoMenor;
                              include('Sugerencias/PesoBajoMenor.php');
                            }
                             if ($pesoCal >= 11.8 && $pesoCal <= 14.9) {
                               echo $VariablePesoNormalMenor;
                               include('Sugerencias/PesoNormalMenor.php');
                             }
                             
                             if ($pesoCal >= 15) {
                              if ($pesoCal >= 16.9) {
                                echo $VariablePesoObesidadMasMenor;
                              }
                               echo $VariablePesoObesidadMenor;
                               include('Sugerencias/PesoBajoMenor.php');
                             }
                            
                                   break;
                                   case "3":
                                    if ($tallaCal <= .92) {
                                     echo $VariableTallaBajaMENOR;
                                     include('Sugerencias/TallaBajaMENOR52.php');
                                     }
                                     if ($tallaCal >= .93 && $tallaCal <= 1.02) {
                                     echo $VariableTallaNormalMENOR; 
                                     include('Sugerencias/TallaNormalMENOR.php');
                                     }
                                     if ($pesoCal <= 12.7) {
                                      echo $VariablePesoBajoMenor;
                                      include('Sugerencias/PesoBajoMenor.php');
                                 
                                    }
                                     if ($pesoCal >= 12.8 && $pesoCal <= 16.1) {
                                       echo $VariablePesoNormalMenor;
                                       include('Sugerencias/PesoNormalMenor.php');
                                     }
                                     
                                     if ($pesoCal >= 16.2) {
                                      if ($pesoCal >= 18.3) {
                                        echo $VariablePesoObesidadMasMenor;
                                      }
                                       echo $VariablePesoObesidadMenor;
                                       include('Sugerencias/PesoBajoMenor.php');
                                     }
                                     
                                           break;
                                           case "3.6":
                                            if ($tallaCal <= .95) {
                                             echo $VariableTallaBajaMENOR;
                                             include('Sugerencias/TallaBajaMENOR52.php');
                                             }
                                             if ($tallaCal >= .96 && $tallaCal <= 1.10) {
                                             echo $VariableTallaNormalMENOR; 
                                             include('Sugerencias/TallaNormalMENOR.php');
                                             }
                                             if ($pesoCal <= 13.6) {
                                              echo $VariablePesoBajoMenor;
                                              include('Sugerencias/PesoBajoMenor.php');
                                         
                                            }
                                             if ($pesoCal >= 13.7 && $pesoCal <= 17.3) {
                                               echo $VariablePesoNormalMenor;
                                               include('Sugerencias/PesoNormalMenor.php');
                                             }
                                             
                                             if ($pesoCal >= 17.4) {
                                              if ($pesoCal >= 19.7) {
                                                echo $VariablePesoObesidadMasMenor;
                                              }
                                               echo $VariablePesoObesidadMenor;
                                               include('Sugerencias/PesoBajoMenor.php');
                                             }
                                             
                                                   break;
                                                   case "4":
                                                    if ($tallaCal <= .99) {
                                                     echo $VariableTallaBajaMENOR;
                                                     include('Sugerencias/TallaBajaMENOR52.php');
                                                     }
                                                     if ($tallaCal >= 1 && $tallaCal <= 1.15) {
                                                     echo $VariableTallaNormalMENOR; 
                                                     include('Sugerencias/TallaNormalMENOR.php');
                                                     
                                                     }
                                                     if ($pesoCal <= 14.4) {
                                                      echo $VariablePesoBajoMenor;
                                                      include('Sugerencias/PesoBajoMenor.php');
                                                      
                                                    }
                                                     if ($pesoCal >= 14.5 && $pesoCal <= 18.5) {
                                                       echo $VariablePesoNormalMenor;
                                                       include('Sugerencias/PesoNormalMenor.php');
                                                     }
                                                     
                                                     if ($pesoCal >= 18.6) {
                                                      if ($pesoCal >= 21.2) {
                                                        echo $VariablePesoObesidadMasMenor;
                                                      }
                                                       echo $VariablePesoObesidadMenor;
                                                       include('Sugerencias/PesoBajoMenor.php');
                                                     }
                                                     
                                                           break; 
                                                           case "4.6":
                                                            if ($tallaCal <= 1.02) {
                                                             echo $VariableTallaBajaMENOR;
                                                             include('Sugerencias/TallaBajaMENOR52.php');
                                                             }
                                                             if ($tallaCal >= 1.03 && $tallaCal <= 1.17) {
                                                             echo $VariableTallaNormalMENOR; 
                                                             include('Sugerencias/TallaNormalMENOR.php');
                                                             }
                                                             if ($pesoCal <= 15.2) {
                                                              echo $VariablePesoBajoMenor;
                                                              include('Sugerencias/PesoBajoMenor.php');
                                                         
                                                            }
                                                             if ($pesoCal >= 15.3 && $pesoCal <= 19.7) {
                                                               echo $VariablePesoNormalMenor;
                                                               include('Sugerencias/PesoNormalMenor.php');
                                                             }
                                                             
                                                             if ($pesoCal >= 19.8) {
                                                              if ($pesoCal >= 22.7) {
                                                                echo $VariablePesoObesidadMasMenor;
                                                              }
                                                               echo $VariablePesoObesidadMenor;
                                                               include('Sugerencias/PesoBajoMenor.php');
                                                             }
                                                             
                                                              
                                                                   break; case "5":
                                                                    if ($tallaCal <= 1.05) {
                                                                     echo $VariableTallaBajaMENOR;
                                                                     include('Sugerencias/TallaBajaMENOR52.php');
                                                                     }
                                                                     if ($tallaCal >= 1.06 && $tallaCal <= 1.19) {
                                                                     echo $VariableTallaNormalMENOR; 
                                                                     include('Sugerencias/TallaNormalMENOR.php');
                                                                     }
                                                                     if ($pesoCal <= 16) {
                                                                      echo $VariablePesoBajoMenor;
                                                                      include('Sugerencias/PesoBajoMenor.php');
                                                                 
                                                                    }
                                                                     if ($pesoCal >= 16.1 && $pesoCal <= 20.9) {
                                                                       echo $VariablePesoNormalMenor;
                                                                       include('Sugerencias/PesoNormalMenor.php');
                                                                     }
                                                                     
                                                                     if ($pesoCal >= 21) {
                                                                       if ($pesoCal >= 24.2) {
                                                                      echo $VariablePesoObesidadMasMenor;
                                                                    }
                                                                       echo $VariablePesoObesidadMenor;
                                                                       include('Sugerencias/PesoBajoMenor.php');
                                                                     }
                                                                    
                                                                         
                                                                           break; 
                                                                                   case "5.6":
                                                                                    if ($imch <= 13) {
                                                                                     echo $VariableBajoPeso;
                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                     }
                                                                                     if ($imch >= 13.1 && $imch <= 14.4) {
                                                                                       echo $VariableBajoRiesgo;
                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                       }
                                                                                     if ($imch >=14.5 && $imch <= 15.9) {
                                                                                     echo $VariablePesoNormal; 
                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                      }
                                                                                     if ($imch >= 16 && $imch <= 16.6) {
                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                     }
                                                                                     if ($imch >= 16.7) {
                                                                                      if ($imch >=18.4) {
                                                                                        echo $VariableObesidad;
                                                                                      }
                                                                                       echo $VariableSobrepeso;
                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                     }
                                                                                     
                                                                                           break;
                                                                                           case "6":
                                                                                            if ($imch <= 13) {
                                                                                             echo $VariableBajoPeso;
                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                             }
                                                                                             if ($imch >= 13.1 && $imch <= 14.3) {
                                                                                               echo $VariableBajoRiesgo;
                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                               }
                                                                                             if ($imch >=14.4 && $imch <= 16.3) {
                                                                                             echo $VariablePesoNormal; 
                                                                                             include('Sugerencias/pesoNormal.php');
                                                                                              }
                                                                                             if ($imch >= 16.5 && $imch <= 16.7) {
                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                             }
                                                                                             if ($imch >= 16.8) {
                                                                                              if ($imch >=18.5) {
                                                                                                echo $VariableObesidad;
                                                                                              }
                                                                                                
                                                                                               echo $VariableSobrepeso;
                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                             }
                                                                                                break;
                                                                                                   case "6.6":
                                                                                                    if ($imch <= 13.1) {
                                                                                                     echo $VariableBajoPeso;
                                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                                     }
                                                                                                     if ($imch >= 13.2 && $imch <= 14.4) {
                                                                                                       echo $VariableBajoRiesgo;
                                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                                       }
                                                                                                     if ($imch >=14.5 && $imch <= 16.1) {
                                                                                                     echo $VariablePesoNormal; 
                                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                                      }
                                                                                                     if ($imch >= 16.2 && $imch <= 16.8) {
                                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                     }
                                                                                                     if ($imch >= 16.9) {
                                                                                                      if ($imch >=18.7) {
                                                                                                        echo $VariableObesidad;
                                                                                                      }
                                                                                                       echo $VariableSobrepeso;
                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                     }
                                                                                                    
                                                                                                           break;
                                                                                                           case "7":
                                                                                                            if ($imch <= 13.1) {
                                                                                                             echo $VariableBajoPeso;
                                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                                         
                                                                                                             }
                                                                                                             if ($imch >= 13.2 && $imch <= 14.4) {
                                                                                                               echo $VariableBajoRiesgo;
                                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                                          
                                                                                                               }
                                                                                                             if ($imch >=14.4 && $imch <= 16.2) {
                                                                                                             echo $VariablePesoNormal; 
                                                                                                             include('Sugerencias/pesoNormal.php');
                                                                                                              }
                                                                                                             if ($imch >= 16.3 && $imch <= 16.9) {
                                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                              
                                                                                                             }
                                                                                                             if ($imch >= 17) {

                                                                                                              if ($imch >=19) {
                                                                                                                echo $VariableObesidad;
                                                                                                         
                                                                                                              }
                                                                                                               echo $VariableSobrepeso;
                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                          
                                                                                                             }
                                                                                                             
                                                                                                     
                                                                                                                   break;
                                                                                                                   case "7.6":
                                                                                                                    if ($imch <= 13.2) {
                                                                                                                     echo $VariableBajoPeso;
                                                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                                                     }
                                                                                                                     if ($imch >= 13.3 && $imch <= 14.6) {
                                                                                                                       echo $VariableBajoRiesgo;
                                                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                                                       }
                                                                                                                     if ($imch >=14.7 && $imch <= 16.4) {
                                                                                                                     echo $VariablePesoNormal; 
                                                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                                                      }
                                                                                                                     if ($imch >= 16.5 && $imch <= 17.1) {
                                                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                     }
                                                                                                                     if ($imch >= 17.2) {
                                                                                                                      if ($imch >=19.3) {
                                                                                                                        echo $VariableObesidad;
                                                                                                                      }
                                                                                                                       echo $VariableSobrepeso;
                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                     }
                                                                                                                     
                                                                                                                           break;
                                                                                                                           case "8":
                                                                                                                            if ($imch <= 13.3) {
                                                                                                                             echo $VariableBajoPeso;
                                                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                                                             }
                                                                                                                             if ($imch >= 13.4 && $imch <= 14.7) {
                                                                                                                               echo $VariableBajoRiesgo;
                                                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                                                               }
                                                                                                                             if ($imch >=14.8 && $imch <= 16.5) {
                                                                                                                             echo $VariablePesoNormal; 
                                                                                                                             include('Sugerencias/pesoNormal.php');
                                                                                                                              }
                                                                                                                             if ($imch >= 16.6 && $imch <= 17.3) {
                                                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                             }
                                                                                                                             if ($imch >= 17.4) {
                                                                                                                              if ($imch >=19.7) {
                                                                                                                                echo $VariableObesidad;
                                                                                                                              }
                                                                                                                               echo $VariableSobrepeso;
                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                             }
                                                                                                                            
                                                                                                                                   break;
                                                                                                                                   case "8.6":
                                                                                                                                    if ($imch <= 13.4) {
                                                                                                                                     echo $VariableBajoPeso;
                                                                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                                                                     }
                                                                                                                                     if ($imch >= 13.5 && $imch <= 15) {
                                                                                                                                       echo $VariableBajoRiesgo;
                                                                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                                                                       }
                                                                                                                                     if ($imch >=15.1 && $imch <= 16.5) {
                                                                                                                                     echo $VariablePesoNormal; 
                                                                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                                                                      }
                                                                                                                                     if ($imch >= 16.6 && $imch <= 17.6) {
                                                                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                                     }
                                                                                                                                     if ($imch >= 17.7) {
                                                                                                                                      if ($imch >=20.1) {
                                                                                                                                        echo $VariableObesidad;
                                                                                                                                      }
                                                                                                                                       echo $VariableSobrepeso;
                                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                                     }
                                                                                                                                     
                                                                                                                                           break;
                                                                                                                                           case "9":
                                                                                                                                            if ($imch <= 13.5) {
                                                                                                                                             echo $VariableBajoPeso;
                                                                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                                                                             }
                                                                                                                                             if ($imch >= 13.6 && $imch <= 15.1) {
                                                                                                                                               echo $VariableBajoRiesgo;
                                                                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                                                                               }
                                                                                                                                             if ($imch >=15.2 && $imch <= 16.6) {
                                                                                                                                             echo $VariablePesoNormal;
                                                                                                                                             include('Sugerencias/pesoNormal.php'); 
                                                                                                                                              }
                                                                                                                                             if ($imch >= 16.7 && $imch <= 17.8) {
                                                                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                                             }
                                                                                                                                             if ($imch >= 17.9) {
                                                                                                                                              if ($imch >=20.5) {
                                                                                                                                                echo $VariableObesidad;
                                                                                                                                              }
                                                                                                                                               echo $VariableSobrepeso;
                                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                                             }
                                                                                                                                            
                                                                                                                                                   break;
                                                                                                                                                   case "9.6":
                                                                                                                                                    if ($imch <= 13.6) {
                                                                                                                                                     echo $VariableBajoPeso;
                                                                                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                                                                                     }
                                                                                                                                                     if ($imch >= 13.7 && $imch <= 15.2) {
                                                                                                                                                       echo $VariableBajoRiesgo;
                                                                                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                                                                                       }
                                                                                                                                                     if ($imch >=15.3 && $imch <= 16.9) {
                                                                                                                                                     echo $VariablePesoNormal; 
                                                                                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                                                                                      }
                                                                                                                                                     if ($imch >= 17 && $imch <= 18.1) {
                                                                                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                     }
                                                                                                                                                     if ($imch >= 18.2) {
                                                                                                                                                      if ($imch >=20.9) {
                                                                                                                                                        echo $VariableObesidad;
                                                                                                                                                      }
                                                                                                                                                       echo $VariableSobrepeso;
                                                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                  
                                                                                                                                                     }
                                                                                                                                                     
                                                                                                                                                           break;
                                                                                                                                                           case "10":
                                                                                                                                                            if ($imch <= 13.5) {
                                                                                                                                                             echo $VariableBajoPeso;
                                                                                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                                                                                             }
                                                                                                                                                             if ($imch >= 13.6 && $imch <= 15.6) {
                                                                                                                                                               echo $VariableBajoRiesgo;
                                                                                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                                                                                               }
                                                                                                                                                             if ($imch >=15.7 && $imch <= 17) {
                                                                                                                                                             echo $VariablePesoNormal; 
                                                                                                                                                             include('Sugerencias/pesoNormal.php');
                                                                                                                                                              }
                                                                                                                                                             if ($imch >= 17.1 && $imch <= 18.9) {
                                                                                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                             }
                                                                                                                                                             if ($imch >= 19) {
                                                                                                                                                              if ($imch >=22.6) {
                                                                                                                                                                echo $VariableObesidad;
                                                                                                                                                              }
                                                                                                                                                               echo $VariableSobrepeso;
                                                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                             }
                                                                                                                                                            
                                                                                                                                                                   break;
                                                                                                                                                                   case "11":
                                                                                                                                                                    if ($imch <= 13.9) {
                                                                                                                                                                     echo $VariableBajoPeso;
                                                                                                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                                                                                                     }
                                                                                                                                                                     if ($imch >= 14 && $imch <= 16.2) {
                                                                                                                                                                       echo $VariableBajoRiesgo;
                                                                                                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                                                                                                       }
                                                                                                                                                                     if ($imch >=16.3 && $imch <= 18) {
                                                                                                                                                                     echo $VariablePesoNormal; 
                                                                                                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                                                                                                      }
                                                                                                                                                                     if ($imch >= 18.1 && $imch <= 19.8) {
                                                                                                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                                     }
                                                                                                                                                                     if ($imch >= 19.9) {
                                                                                                                                                                      if ($imch >=23.7) {
                                                                                                                                                                        echo $VariableObesidad;
                                                                                                                                                                      }
                                                                                                                                                                       echo $VariableSobrepeso;
                                                                                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                                     }
                                                                                                                                                                    
                                                                                                                                                                           break;
                                                                                                                                                                           case "12":
                                                                                                                                                                            if ($imch <= 14.4) {
                                                                                                                                                                             echo $VariableBajoPeso;
                                                                                                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                                                                                                             }
                                                                                                                                                                             if ($imch >= 14.5 && $imch <= 17.3) {
                                                                                                                                                                               echo $VariableBajoRiesgo;
                                                                                                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                                                                                                               }
                                                                                                                                                                             if ($imch >= 17.4 && $imch <= 18.9) {
                                                                                                                                                                             echo $VariablePesoNormal; 
                                                                                                                                                                             include('Sugerencias/pesoNormal.php');
                                                                                                                                                                              }
                                                                                                                                                                             if ($imch >= 18.8 && $imch <= 20.7) {
                                                                                                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                                             }
                                                                                                                                                                             if ($imch >= 20.8) {
                                                                                                                                                                              if ($imch >=25) {
                                                                                                                                                                                echo $VariableObesidad;
                                                                                                                                                                              }
                                                                                                                                                                               echo $VariableSobrepeso;
                                                                                                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                                             }
                                                                                                                                                                             
                                                                                                                                                                                   break;
    }
    
}




// Sexo Mujer
if($sexo=="2"){

$imc="";
$sumaTalla="";
// Formula para calcular el Imc en niñas
$sumaTalla = $tallaCal*$tallaCal;
$imc=$pesoCal/ $sumaTalla;
//dependiendo de sus edad 7*
$calcular = $edadsCal;

//OPCIONES MENORES DE 7 AÑOS
$VariableTallaBajaMENOR='<div class="alert alert-danger" role="alert"><i class="bi bi-person-exclamation" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Estatura. <strong>Bajo !</strong> <a href="#" class="alert-link"></a></div>';
$VariableTallaNormalMENOR='<div class="alert alert-primary" role="alert"><i class="bi bi-person-fill-check" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Estatura. <strong>Normal !</strong> <a href="#" class="alert-link"></a></div>';

// vaiable peso
$VariablePesoNormalMenor='<div class="alert alert-primary" role="alert"><i class="bi bi-shield-shaded" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Saludable !</strong><a href="#" class="alert-link"></a></div>';
$VariablePesoBajoMenor='<div class="alert alert-warning" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Bajo !</strong> <a href="#" class="alert-link"></a></div>';
$VariablePesoObesidadMenor='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Sobrepeso !</strong> <a href="#" class="alert-link"></a></div>';
$VariablePesoObesidadMasMenor='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de peso. <strong>Obesidad !</strong> <a href="#" class="alert-link"></a></div>';



//OPCIONES DE 7 AÑOS EN ADELANTE
$VariableBajoPeso='<div class="alert alert-danger" role="alert"> <i class="bi bi-exclamation-square-fill"></i> Bajo de Peso</div>';
$VariableBajoRiesgo='<div class="alert alert-warning" role="alert"><i class="bi bi-shield-fill-exclamation"></i> En riesgos de desnutricion</div>';
$VariablePesoNormal='<div class="alert alert-primary" role="alert"><i class="bi bi-shield-shaded"style="font-size: 2rem;"></i> <h4>¡Estado de Nutricion. <strong>Saludable !</strong></h4> <a href="#" class="alert-link"></a></div>';
$VariableSobrepesoRiesgo='<div class="alert alert-warning"  role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Nutricion. <strong>En riesgo de sobrepeso !</strong> <a href="#" class="alert-link"></a></div>';
$VariableSobrepeso='<div class="alert alert-warning"  role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Nutricion. <strong>Sobrepeso !</strong> <a href="#" class="alert-link"></a></div>';
$VariableObesidad='<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-square-fill" style="font-size: 2rem; margin-right: 10px;"></i>¡Estado de Nutricion. <strong>Obesidad !</strong> <a href="#" class="alert-link"></a></div>';


switch ($calcular) {
  case "1":
    if ($tallaCal <= .71) {
     echo $VariableTallaBajaMENOR;
     include('Sugerencias/TallaBajaMENOR.php');
     }
     if ($tallaCal >= .72 && $tallaCal <= .75 ) {
     echo $VariableTallaNormalMENOR; 
     include('Sugerencias/TallaNormalMENOR.php');
     }
     if ($pesoCal <= 7.9) {
      echo $VariablePesoBajoMenor;
      include('Sugerencias/PesoBajoMenor.php');
 
    }
     if ($pesoCal >= 8 && $pesoCal <= 10.1) {
       echo $VariablePesoNormalMenor;
       include('Sugerencias/PesoNormalMenor.php');
     }
     
     if ($pesoCal >= 10.2) {
      if ($pesoCal >= 11.5) {
        echo $VariablePesoObesidadMasMenor;
  
      }
       echo $VariablePesoObesidadMenor;
       include('Sugerencias/PesoObesidadMenor.php');
     }
     
           break;
    case "1.6":
      if ($tallaCal <= .77) {
        echo $VariableTallaBajaMENOR;
        include('Sugerencias/TallaBajaMENOR.php');
        }
        if ($tallaCal >= .78 && $tallaCal <= .87) {
        echo $VariableTallaNormalMENOR; 
        include('Sugerencias/TallaNormalMENOR.php');
        }
        if ($pesoCal <= 9.1) {
         echo $VariablePesoBajoMenor;
         include('Sugerencias/PesoBajoMenor.php');
       }
        if ($pesoCal >= 9.2 && $pesoCal <= 11.6) {
          echo $VariablePesoNormalMenor;
          include('Sugerencias/PesoNormalMenor.php');
        }
        
        if ($pesoCal >= 11.7) {
          if ($pesoCal >= 13.2) {
            echo $VariablePesoObesidadMasMenor;
          }
          echo $VariablePesoObesidadMenor;
          include('Sugerencias/PesoObesidadMenor.php');
        }
       
                   break;
            case "2":
              if ($tallaCal <= .83) {
                echo $VariableTallaBajaMENOR;
                include('Sugerencias/TallaBajaMENOR.php');
                }
                if ($tallaCal >= .84 && $tallaCal <= .95) {
                echo $VariableTallaNormalMENOR; 
                include('Sugerencias/TallaNormalMENOR.php');
                }
                if ($pesoCal <= 10.2) {
                 echo $VariablePesoBajoMenor;
                 include('Sugerencias/PesoBajoMenor.php');
            
               }
                if ($pesoCal >= 10.3 && $pesoCal <= 13) {
                  echo $VariablePesoNormalMenor;
                  include('Sugerencias/PesoNormalMenor.php');
                }
                
                if ($pesoCal >= 13.1) {
                  if ($pesoCal >= 14.8) {
                    echo $VariablePesoObesidadMasMenor;
                    
                  }
                  echo $VariablePesoObesidadMenor;
                  include('Sugerencias/PesoObesidadMenor.php');
                }
                
                           break;
                    case "2.6":
                      if ($tallaCal <= .87) {
                        echo $VariableTallaBajaMENOR;
                        include('Sugerencias/TallaBajaMENOR5.php');
                        }
                        if ($tallaCal >= .88 && $tallaCal <= .97) {
                        echo $VariableTallaNormalMENOR; 
                        include('Sugerencias/TallaNormalMENOR.php');
                        }
                        if ($pesoCal <= 11.2) {
                         echo $VariablePesoBajoMenor;
                         include('Sugerencias/PesoBajoMenor.php');
                    
                       }
                        if ($pesoCal >= 11.3 && $pesoCal <= 14.3) {
                          echo $VariablePesoNormalMenor;
                          include('Sugerencias/PesoNormalMenor.php');
                        }
                        
                        if ($pesoCal >= 14.4) {
                          if ($pesoCal >= 16.5) {
                            echo $VariablePesoObesidadMasMenor;
                          }
                            
                          echo $VariablePesoObesidadMenor;
                          include('Sugerencias/PesoObesidadMenor.php');
                        }
                               break;
                          case "3":
                            if ($tallaCal <= .91) {
                              echo $VariableTallaBajaMENOR;
                              include('Sugerencias/TallaBajaMENOR5.php');
                              }
                              if ($tallaCal >= .92 && $tallaCal <= 1.10) {
                              echo $VariableTallaNormalMENOR; 
                              include('Sugerencias/TallaNormalMENOR.php');
                              }
                              if ($pesoCal <= 12.2) {
                               echo $VariablePesoBajoMenor;
                               include('Sugerencias/PesoBajoMenor.php');
                          
                             }
                              if ($pesoCal >= 12.3 && $pesoCal <= 15.7) {
                                echo $VariablePesoNormalMenor;
                                include('Sugerencias/PesoNormalMenor.php');
                              }
                              
                              if ($pesoCal >= 15.8) {
                                if ($pesoCal >= 18.1) {
                                  echo $VariablePesoObesidadMasMenor;
                                }
                                echo $VariablePesoObesidadMenor;
                                include('Sugerencias/PesoObesidadMenor.php');
                              }
                              
                                           break;
                                   case "3.6":
                                    if ($tallaCal <= .95) {
                                      echo $VariableTallaBajaMENOR;
                                      include('Sugerencias/TallaBajaMENOR5.php');
                                      }
                                      if ($tallaCal >= .96 && $tallaCal <= 1.15) {
                                      echo $VariableTallaNormalMENOR; 
                                      include('Sugerencias/TallaNormalMENOR.php');
                                      }
                                      if ($pesoCal <= 13.1) {
                                       echo $VariablePesoBajoMenor;
                                       include('Sugerencias/PesoBajoMenor.php');
                                  
                                     }
                                      if ($pesoCal >= 13.2 && $pesoCal <= 17.1) {
                                        echo $VariablePesoNormalMenor;
                                        include('Sugerencias/PesoNormalMenor.php');
                                      }
                                      
                                      if ($pesoCal >= 17.2) {
                                        if ($pesoCal >= 19.8) {
                                          echo $VariablePesoObesidadMasMenor;
                                        }
                                        echo $VariablePesoObesidadMenor;
                                        include('Sugerencias/PesoObesidadMenor.php');
                                      }
                                      
                                                   break;
                                          case "4":
                                            if ($tallaCal <= .98) {
                                              echo $VariableTallaBajaMENOR;
                                              include('Sugerencias/TallaBajaMENOR5.php');
                                              }
                                              if ($tallaCal >= .99 && $tallaCal <= 1.15) {
                                              echo $VariableTallaNormalMENOR; 
                                              include('Sugerencias/TallaNormalMENOR.php');
                                              }
                                              if ($pesoCal <= 14) {
                                               echo $VariablePesoBajoMenor;
                                               include('Sugerencias/PesoBajoMenor.php');
                                          
                                             }
                                              if ($pesoCal >= 14.1 && $pesoCal <= 18.4) {
                                                echo $VariablePesoNormalMenor;
                                                include('Sugerencias/PesoNormalMenor.php');
                                              }
                                              
                                              if ($pesoCal >= 18.5) {
                                                if ($pesoCal >= 21.5) {
                                                  echo $VariablePesoObesidadMasMenor;
                                                }
                                                echo $VariablePesoObesidadMenor;
                                                include('Sugerencias/PesoObesidadMenor.php');
                                              }
                                             
                                                           break;
                                                    case "4.6":
                                                      if ($tallaCal <= 1.01) {
                                                        echo $VariableTallaBajaMENOR;
                                                        include('Sugerencias/TallaBajaMENOR5.php');
                                                        }
                                                        if ($tallaCal >= 1.02 && $tallaCal <= 1.09) {
                                                        echo $VariableTallaNormalMENOR; 
                                                        include('Sugerencias/TallaNormalMENOR.php');
                                                        }
                                                        if ($pesoCal <= 14.9) {
                                                         echo $VariablePesoBajoMenor;
                                                         include('Sugerencias/PesoBajoMenor.php');
                                                    
                                                       }
                                                        if ($pesoCal >= 15 && $pesoCal <= 19.9) {
                                                          echo $VariablePesoNormalMenor;
                                                          include('Sugerencias/PesoNormalMenor.php');
                                                        }
                                                        
                                                        if ($pesoCal >= 20) {
                                                          if ($pesoCal >= 23.2) {
                                                            echo $VariablePesoObesidadMasMenor;
                                                          }
                                                          echo $VariablePesoObesidadMenor;
                                                          include('Sugerencias/PesoObesidadMenor.php');
                                                        }
                                                      
                                                                   break;
                                                            case "5":
                                                              if ($tallaCal <= 1.04) {
                                                                echo $VariableTallaBajaMENOR;
                                                                include('Sugerencias/TallaBajaMENOR5.php');
                                                                }
                                                                if ($tallaCal >= 1.05 && $tallaCal <= 1.15) {
                                                                echo $VariableTallaNormalMENOR; 
                                                                include('Sugerencias/TallaNormalMENOR.php');
                                                                }
                                                                if ($pesoCal <= 15.8) {
                                                                 echo $VariablePesoBajoMenor;
                                                                 include('Sugerencias/PesoBajoMenor.php');
                                                            
                                                               }
                                                                if ($pesoCal >= 15.9 && $pesoCal <= 21.1) {
                                                                  echo $VariablePesoNormalMenor;
                                                                  include('Sugerencias/PesoNormalMenor.php');
                                                                }
                                                                
                                                                if ($pesoCal >= 21.2) {
                                                                  if ($pesoCal >= 24.9) {
                                                                    echo $VariablePesoObesidadMasMenor;
                                                                  }
                                                                  echo $VariablePesoObesidadMenor;
                                                                  include('Sugerencias/PesoObesidadMenor.php');
                                                                }
                                                                
                                                                           break;
                                                                    case "5.6":
                                                                            if ($imc <= 12.7) {
                                                                             echo $VariableBajoPeso;
                                                                             include('Sugerencias/pesoBajo.php');
                                                                             }
                                                                             if ($imc >= 12.8 && $imc <= 14.5) {
                                                                               echo $VariableBajoRiesgo;
                                                                               include('Sugerencias/pesoBajo.php');
                                                                               }
                                                                             if ($imc >=14.6 && $imc <= 15.8) {
                                                                             echo $VariablePesoNormal; 
                                                                             include('Sugerencias/pesoNormal.php');
                                                                              }
                                                                             if ($imc >= 15.8 && $imc <= 16.8) {
                                                                               echo $VariableSobrepesoRiesgo;
                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                             }
                                                                             if ($imc >= 16.9) {
                                                                              if ($imc >=19.0) {
                                                                                echo $VariableObesidad;
                                                                              }
                                                                               echo $VariableSobrepeso;
                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                             }
                                                                             
                                                                                   break;
                                                                          case "6":
                                                                                    if ($imc <= 12.7) {
                                                                                     echo $VariableBajoPeso;
                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                     }
                                                                                     if ($imc >= 12.8 && $imc <=14.7) {
                                                                                       echo $VariableBajoRiesgo;
                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                       }
                                                                                     if ($imc >=14.7 && $imc <= 15.8) {
                                                                                     echo $VariablePesoNormal; 
                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                     }
                                                                                     if ($imc >=15.8 && $imc <= 16.9) {
                                                                                       echo $VariableSobrepesoRiesgo;
                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                     }
                                                                                     if ($imc >= 17) {
                                                                                      if ($imc >=19.2) {
                                                                                        echo $VariableObesidad;
                                                                                      }
                                                                                       echo $VariableSobrepeso;
                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                     }
                                                                                     
                                                                                           break;
                                                                                     case "6.6":
                                                                                            if ($imc <= 12.7) {
                                                                                             echo $VariableBajoPeso;
                                                                                             include('Sugerencias/pesoBajo.php');
                                                                                             }
                                                                                             if ($imc >= 12.8 && $imc <=14.7) {
                                                                                               echo $VariableBajoRiesgo;
                                                                                               include('Sugerencias/pesoBajo.php');
                                                                                               }
                                                                                             if ($imc >=14.8 && $imc <= 15.7) {
                                                                                             echo $VariablePesoNormal; 
                                                                                             include('Sugerencias/pesoNormal.php');
                                                                                             }
                                                                                             if ($imc >=15.8 && $imc <= 17) {
                                                                                               echo $VariableSobrepesoRiesgo;
                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                             }
                                                                                             if ($imc >= 17.1) {
                                                                                              if ($imc >=19.5) {
                                                                                                echo $VariableObesidad;
                                                                                              }
                                                                                               echo $VariableSobrepeso;
                                                                                               include('Sugerencias/pesoSobrepero.php');
                                                                                             }
                                                                                             
                                                                                                   break;
                                                                                             case "7":
                                                                                                    if ($imc <= 12.7) {
                                                                                                     echo $VariableBajoPeso;
                                                                                                     include('Sugerencias/pesoBajo.php');
                                                                                                     }
                                                                                                     if ($imc >= 12.8 && $imc <= 14.9) {
                                                                                                       echo $VariableBajoRiesgo;
                                                                                                       include('Sugerencias/pesoBajo.php');
                                                                                                       }
                                                                                                     if ($imc >= 15.0 && $imc <= 16.0) {
                                                                                                     echo $VariablePesoNormal; 
                                                                                                     include('Sugerencias/pesoNormal.php');
                                                                                                     }
                                                                                                     if ($imc >= 16.1 && $imc <= 17.3) {
                                                                                                       echo $VariableSobrepesoRiesgo; 
                                                                                                       include('Sugerencias/pesoSobrepero.php');                                                                                                 
                                                                                                     }
                                                                                                     if ($imc >= 17.0) {
                                                                                                      if ($imc >= 19.8) {
                                                                                                        echo $VariableObesidad;
                                                                                                      }
                                                                                                       echo $VariableSobrepeso;
                                                                                                       include('Sugerencias/pesoSobrepero.php');
                                                                                                     }
                                                                                                     
                                                                                                           break;
                                                                                              case "7.6":
                                                                                                      if ($imc <= 12.8) {
                                                                                                        echo $VariableBajoPeso;
                                                                                                        include('Sugerencias/pesoBajo.php');
                                                                                                        }
                                                                                                        if ($imc >= 12.7 && $imc <= 14.9) {
                                                                                                          echo $VariableBajoRiesgo;
                                                                                                          include('Sugerencias/pesoBajo.php');
                                                                                                          }
                                                                                                        if ($imc >= 15.1 && $imc <= 16.0) {
                                                                                                        echo $VariablePesoNormal; 
                                                                                                        include('Sugerencias/pesoNormal.php');
                                                                                                        }
                                                                                                        if ($imc >= 16.1 && $imc <= 17.4) {
                                                                                                          echo $VariableSobrepesoRiesgo;
                                                                                                          include('Sugerencias/pesoSobrepero.php');
                                                                                                        }
                                                                                                        if ($imc >= 17.5) {
                                                                                                          if ($imc > 20.1) {
                                                                                                            echo $VariableObesidad;
                                                                                                          }
                                                                                                          echo $VariableSobrepeso;
                                                                                                          include('Sugerencias/pesoSobrepero.php');
                                                                                                        }
                                                                                                        
                                                                                                              break;
                                                                                                              case "8":
                                                                                                                if ($imc <= 12.9) {
                                                                                                                  echo $VariableBajoPeso;
                                                                                                                  include('Sugerencias/pesoBajo.php');
                                                                                                                  }
                                                                                                                  if ($imc >= 13 && $imc <= 15.3) {
                                                                                                                    echo $VariableBajoRiesgo;
                                                                                                                    include('Sugerencias/pesoBajo.php');
                                                                                                                    }
                                                                                                                  if ($imc >= 15.4 && $imc <= 16.3) {
                                                                                                                  echo $VariablePesoNormal; 
                                                                                                                  include('Sugerencias/pesoNormal.php');
                                                                                                                  }
                                                                                                                  if ($imc >= 16.4 && $imc < 17.6) {
                                                                                                                    echo $VariableSobrepesoRiesgo;
                                                                                                                    include('Sugerencias/pesoSobrepero.php');
                                                                                                                  }
                                                                                                                  if ($imc >= 17.7) {
                                                                                                                    if ($imc >= 20.6) {
                                                                                                                      echo $VariableObesidad;
                                                                                                                    }
                                                                                                                    echo $VariableSobrepeso;
                                                                                                                    include('Sugerencias/pesoSobrepero.php');
                                                                                                                  }
                                                                                                                 
                                                                                                                        break;
                                                                                                                          case "8.6":
                                                                                                                if ($imc <= 13) {
                                                                                                                  echo $VariableBajoPeso;
                                                                                                                  include('Sugerencias/pesoBajo.php');
                                                                                                                  }
                                                                                                                  if ($imc >= 13.1 && $imc <= 15.4) {
                                                                                                                    echo $VariableBajoRiesgo;
                                                                                                                    include('Sugerencias/pesoBajo.php');
                                                                                                                    }
                                                                                                                  if ($imc >= 15.5 && $imc <= 16.4) {
                                                                                                                  echo $VariablePesoNormal; 
                                                                                                                  include('Sugerencias/pesoNormal.php');
                                                                                                                  }
                                                                                                                  if ($imc >= 16.5 && $imc <= 17.6) {
                                                                                                                    echo $VariableSobrepesoRiesgo;
                                                                                                                    include('Sugerencias/pesoSobrepero.php');
                                                                                                                  }
                                                                                                                  if ($imc >= 18) {
                                                                                                                    if ($imc >= 21) {
                                                                                                                      echo $VariableObesidad;
                                                                                                                    }
                                                                                                                    echo $VariableSobrepeso;
                                                                                                                    include('Sugerencias/pesoSobrepero.php');
                                                                                                                  }
                                                                                                                  
                                                                                                                        break;
                                                                                                                        case "9":
                                                                                                                          if ($imc <= 13.1) {
                                                                                                                            echo $VariableBajoPeso;
                                                                                                                            include('Sugerencias/pesoBajo.php');
                                                                                                                            }
                                                                                                                            if ($imc >= 13.2 && $imc <= 15.5) {
                                                                                                                              echo $VariableBajoRiesgo;
                                                                                                                              include('Sugerencias/pesoBajo.php');
                                                                                                                              }
                                                                                                                            if ($imc >= 15.6 && $imc <= 16.6) {
                                                                                                                            echo $VariablePesoNormal; 
                                                                                                                            include('Sugerencias/pesoNormal.php');
                                                                                                                            }
                                                                                                                            if ($imc >= 16.5 && $imc <= 18.2) {
                                                                                                                              echo $VariableSobrepesoRiesgo;
                                                                                                                              include('Sugerencias/pesoSobrepero.php');
                                                                                                                            }
                                                                                                                            if ($imc >= 18.3) {
                                                                                                                              if ($imc >= 21.5) {
                                                                                                                                echo $VariableObesidad;
                                                                                                                              }
                                                                                                                              echo $VariableSobrepeso;
                                                                                                                              include('Sugerencias/pesoSobrepero.php');
                                                                                                                            }
                                                                                                                           
                                                                                                                                  break;
                                                                                                                                  case "9.6":
                                                                                                                                    if ($imc <= 13.3) {
                                                                                                                                      echo $VariableBajoPeso;
                                                                                                                                      include('Sugerencias/pesoBajo.php');
                                                                                                                                      }
                                                                                                                                      if ($imc >= 13.4 && $imc <= 15.7) {
                                                                                                                                        echo $VariableBajoRiesgo;
                                                                                                                                        include('Sugerencias/pesoBajo.php');
                                                                                                                                        }
                                                                                                                                      if ($imc >= 15.8 && $imc <= 16.7) {
                                                                                                                                      echo $VariablePesoNormal; 
                                                                                                                                      include('Sugerencias/pesoNormal.php');
                                                                                                                                      }
                                                                                                                                      if ($imc >= 16.8 && $imc <= 18.6) {
                                                                                                                                        echo $VariableSobrepesoRiesgo;
                                                                                                                                        include('Sugerencias/pesoSobrepero.php');
                                                                                                                                      }
                                                                                                                                      if ($imc >= 18.7) {
                                                                                                                                        if ($imc >= 22.0) {
                                                                                                                                          echo $VariableObesidad;
                                                                                                                                        }
                                                                                                                                        echo $VariableSobrepeso;
                                                                                                                                        include('Sugerencias/pesoSobrepero.php');
                                                                                                                                      }
                                                                                                                                      
                                                                                                                                            break;
                                                                                                                                            case "10":
                                                                                                                                              if ($imc <= 13.5) {
                                                                                                                                                echo $VariableBajoPeso;
                                                                                                                                                include('Sugerencias/pesoBajo.php');
                                                                                                                                                }
                                                                                                                                                if ($imc >= 13.6 && $imc <= 15.9) {
                                                                                                                                                  echo $VariableBajoRiesgo;
                                                                                                                                                  include('Sugerencias/pesoBajo.php');
                                                                                                                                                  }
                                                                                                                                                if ($imc >= 16 && $imc <= 17) {
                                                                                                                                                echo $VariablePesoNormal; 
                                                                                                                                                include('Sugerencias/pesoNormal.php');
                                                                                                                                                }
                                                                                                                                                if ($imc >= 17.1 && $imc <= 18.9) {
                                                                                                                                                  echo $VariableSobrepesoRiesgo;
                                                                                                                                                  include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                }
                                                                                                                                                if ($imc >= 19.0) {
                                                                                                                                                  if ($imc >= 22.6) {
                                                                                                                                                    echo $VariableObesidad;
                                                                                                                                                  }
                                                                                                                                                  echo $VariableSobrepeso;
                                                                                                                                                  include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                }
                                                                                                                                               
                                                                                                                                                      break;
                                                                                                                                                      case "11":
                                                                                                                                                        if ($imc <= 13.9) {
                                                                                                                                                          echo $VariableBajoPeso;
                                                                                                                                                          include('Sugerencias/pesoBajo.php');
                                                                                                                                                          }
                                                                                                                                                          if ($imc >= 14 && $imc <= 16.5) {
                                                                                                                                                            echo $VariableBajoRiesgo;
                                                                                                                                                            include('Sugerencias/pesoBajo.php');
                                                                                                                                                            }
                                                                                                                                                          if ($imc >= 16.6 && $imc <= 17.6) {
                                                                                                                                                          echo $VariablePesoNormal; 
                                                                                                                                                          include('Sugerencias/pesoNormal.php');
                                                                                                                                                          }
                                                                                                                                                          if ($imc >= 17.7 && $imc <= 19.8) {
                                                                                                                                                            echo $VariableSobrepesoRiesgo;
                                                                                                                                                            include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                          }
                                                                                                                                                          if ($imc >= 19.9) {
                                                                                                                                                            if ($imc >= 23.7) {
                                                                                                                                                              echo $VariableObesidad;
                                                                                                                                                            }
                                                                                                                                                            echo $VariableSobrepeso;
                                                                                                                                                            include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                          }
                                                                                                                                                         
                                                                                                                                                                break;
                                                                                                                                                                case "12":
                                                                                                                                                                  if ($imc <= 14.4) {
                                                                                                                                                                    echo $VariableBajoPeso;
                                                                                                                                                                    include('Sugerencias/pesoBajo.php');
                                                                                                                                                                    }
                                                                                                                                                                    if ($imc >= 14.5 && $imc <= 17.4) {
                                                                                                                                                                      echo $VariableBajoRiesgo;
                                                                                                                                                                      include('Sugerencias/pesoBajo.php');
                                                                                                                                                                      }
                                                                                                                                                                    if ($imc >= 17.5 && $imc <= 18.5) {
                                                                                                                                                                    echo $VariablePesoNormal; 
                                                                                                                                                                    include('Sugerencias/pesoNormal.php');
                                                                                                                                                                    }
                                                                                                                                                                    if ($imc >= 18.6 && $imc <= 20.7) {
                                                                                                                                                                      echo $VariableSobrepesoRiesgo;
                                                                                                                                                                      include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                                    }
                                                                                                                                                                    if ($imc >= 20.8) {
                                                                                                                                                                      if ($imc >= 25) {
                                                                                                                                                                        echo $VariableObesidad;
                                                                                                                                                                      }
                                                                                                                                                                      echo $VariableSobrepeso;
                                                                                                                                                                      include('Sugerencias/pesoSobrepero.php');
                                                                                                                                                                    }
                                                                                                                                                                   
                                                                                                                                                                          break;




                                                                                                                                                                          
                                                                                                        }
                                                                                                        
                                                                                                        

/*else{
echo '<div class="alert alert-success" role="alert">
<h4 class="alert-heading">Aun no se encuetran Datos!</h4>

<hr>
<p class="mb-0">Los datos se iran graficando de acurdo a los datos grabados</p>
</div>';
}*/
//datos varibale de IMC

}

?>