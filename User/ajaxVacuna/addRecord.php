<?php
	if(isset($_POST['vacuna']))
	{
		// include Database connection file 
		include("../ajax/db_connection.php");

		// get values 
		$id_usuarioVacunas = $_POST['id_usuarioVacunas'];
		$vacuna = $_POST['vacuna'];
		$dosis = $_POST['dosis'];
		$edadVacuna = $_POST['edadVacuna'];
	
	

		$query = "INSERT INTO vacuna (id_menor, nombre, dosis, edad_aplicacion, fecha_aplicacion) VALUES('$id_usuarioVacunas', '$vacuna', '$dosis', '$edadVacuna', now())";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>