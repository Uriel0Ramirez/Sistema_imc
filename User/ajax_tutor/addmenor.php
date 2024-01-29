<?php
	if(isset($_POST['id_tutor']))
	{
		// include Database connection file 
		include("../ajax/db_connection.php");

		// get values 
		$id_tutor = $_POST['id_tutor'];
		$nombre = $_POST['nombre'];
		$apellido_p = $_POST['apellido_p'];
		$apellido_m = $_POST['apellido_m'];
		$edadm = $_POST['edadm'];
		$sexo = $_POST['sexo'];
		$no_hijos = $_POST['no_hijos'];

		// Define la clave para el cifrado AES
		$clave = "clave_secreta"; // Reemplaza con tu clave segura

		// Encripta los valores
		
		$nombre_encriptado = openssl_encrypt($nombre, 'AES-256-CBC', $clave, 0, '1234567890123456');
		$apellido_p_encriptado = openssl_encrypt($apellido_p, 'AES-256-CBC', $clave, 0, '1234567890123456');
		$apellido_m_encriptado = openssl_encrypt($apellido_m, 'AES-256-CBC', $clave, 0, '1234567890123456');
		
		

		// Inserta los valores encriptados en la base de datos
		$query = "INSERT INTO menor (id_tutor, nombre, apellido_p, apellido_m, edad, sexo, no_hijos) 
				  VALUES ('$id_tutor', '$nombre_encriptado', '$apellido_p_encriptado', '$apellido_m_encriptado', '$edadm', '$sexo', '$no_hijos')";

		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>
