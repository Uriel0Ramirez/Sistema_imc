<?php
// include Database connection file
include("../ajax/db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
	
	$pass=$_POST['pass'];
   
   
  


    // Updaste User details
    $query = "UPDATE userlocal SET Contraseña='$pass' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}