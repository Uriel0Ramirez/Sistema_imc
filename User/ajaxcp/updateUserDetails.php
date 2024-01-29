<?php
// include Database connection file
include("../ajax/db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
	    $Nombre  = strtoupper ($_POST['Nombre']);
		$apelli_Paterno = strtoupper ($_POST['apelli_Paterno']);
		$apelli_Materno  = strtoupper ($_POST['apelli_Materno']);
     
        
   



    // Updaste User details
    $query = "UPDATE misdatos SET Nombre='$Nombre', apelli_Paterno='$apelli_Paterno', apelli_Materno='$apelli_Materno', Nombre_menor='$Nombre_menor', apellidoPater_menor='$apellidoPater_menor', apellidoMaterno_Menor='$apellidoMaterno_Menor' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}