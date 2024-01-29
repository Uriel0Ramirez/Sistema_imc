<?php
	if(isset($_POST['Contraseña']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
	
		$Usuario = $_POST['Usuario'];
		$Contraseña = md5($_POST['Contraseña']);
		
		//$obs = strtoupper($_POST['obs']);

		$query = "INSERT INTO usuarios(	usuario, contraseña) VALUES('$Usuario', '$Contraseña')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>