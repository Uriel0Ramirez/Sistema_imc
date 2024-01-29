<?php
	if(isset($_POST['nombre']) )
	{
		// include Database connection file 
		include("../ajax/db_connection.php");

		// get values 
		$nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$Contraseña = $_POST['Contraseña'];
		

		$query = "INSERT INTO userlocal(Nombre, usuario, Contraseña) VALUES('$nombre', '$usuario', '$Contraseña')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>