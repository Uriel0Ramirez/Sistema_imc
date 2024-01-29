<?php
	if(isset($_POST['id_usuario']))
	{
		// include Database connection file 
		include("../ajax/db_connection.php");

		// get values 
		$id_usuario = $_POST['id_usuario'];
		$nombre = $_POST['nombre'];
		$apellido_p = $_POST['apellido_p'];
		$apellido_m = $_POST['apellido_m'];
		$edadt = $_POST['edadt'];
		$no_hijos = $_POST['no_hijos'];

		// Define la clave para el cifrado AES
		$clave = "clave_secreta"; // Reemplaza con tu clave segura

		// Encripta los valores
		
		$nombre_encriptado = openssl_encrypt($nombre, 'AES-256-CBC', $clave, 0, '1234567890123456');
		$apellido_p_encriptado = openssl_encrypt($apellido_p, 'AES-256-CBC', $clave, 0, '1234567890123456');
		$apellido_m_encriptado = openssl_encrypt($apellido_m, 'AES-256-CBC', $clave, 0, '1234567890123456');
		$edadt_encriptado = openssl_encrypt($edadt, 'AES-256-CBC', $clave, 0, '1234567890123456');
	

		// Inserta los valores encriptados en la base de datos
		$query = "INSERT INTO tutor (id_usuario, nombre, apellido_p, apellido_m, edad, no_hijos) 
				  VALUES ('$id_usuario', '$nombre_encriptado', '$apellido_p_encriptado', '$apellido_m_encriptado', '$edadt_encriptado', '$no_hijos')";

		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>
