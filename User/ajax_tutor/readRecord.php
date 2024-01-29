<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial list 
	$data = '<div class="container px-4 py-5" id="featured-3">
				
				<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">';
	session_start(); 
	$id_tutor = $_SESSION['id_tutor'];
						
	$query = "SELECT * FROM menor WHERE id_tutor='$id_tutor'";

	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}

	// if query results contain rows then fetch those rows 
	if(mysqli_num_rows($result) > 0) {
		$number = 1;
		while($row = mysqli_fetch_assoc($result)) {
			// Define la clave para el cifrado AES
			$clave = "clave_secreta"; // Reemplaza con tu clave segura

			// Desencripta los valores
			$nombre_desencriptado = openssl_decrypt($row['nombre'], 'AES-256-CBC', $clave, 0, '1234567890123456');
			$apellido_p_desencriptado = openssl_decrypt($row['apellido_p'], 'AES-256-CBC', $clave, 0, '1234567890123456');
			$apellido_m_desencriptado = openssl_decrypt($row['apellido_m'], 'AES-256-CBC', $clave, 0, '1234567890123456');

			$data .= '<div class="feature col">
						<div class="border p-3" style="background: rgb(238,174,202); background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);">
							<h2>
								<div class="text">
									'.$nombre_desencriptado.'
									'.$apellido_p_desencriptado.'
									'.$apellido_m_desencriptado.'
								</div>
							</h2>
							<p>Opciones para el infante</p>
						
								<button onclick="GetUserDetails('.$row['id_menor'].')" class="btn btn-warning">
									<i class="fas fa-edit"></i> Editar
								</button>
								<a href="./tutelado.php?id_menor='.$row['id_menor'].'" class="btn btn-warning">
									<i class="fas fa-edit"></i> Verificar
								</a>
								<a href="./reporte/reporte.php?id_menor='.$row['id_menor'].'" class="btn btn-warning">
									<i class="fas fa-edit"></i> Reporte PDF
								</a>
							</a>
						</div>
					</div>';
			$number++;
		}
	}
	else {
		// records not found 
		$data .= '<div>No hay registros!</div>';
	}

	$data .= '</div></div>';

	echo $data;
?>
