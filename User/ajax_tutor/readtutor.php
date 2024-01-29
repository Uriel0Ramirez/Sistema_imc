<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial form 
	$data = '<div class="container">
				<form>
				
				</form>
			</div>';

	session_start(); 
	$id_tutor= $_SESSION['id_tutor'];
						
	$query = "SELECT * FROM tutor WHERE id_tutor='$id_tutor'";

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

			$data .= '<div class="container">
						
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="'.$nombre_desencriptado.'" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Apellido Paterno</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="'.$apellido_p_desencriptado.'" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Apellido Materno</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="'.$apellido_m_desencriptado.'" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-10 offset-sm-2">
								<button onclick="GetUserDetails('.$row['id_tutor'].')" class="btn btn-warning">Actualizar</button>
							</div>
						</div>
					</div>';
			$number++;
		}
	}
	else {
		// records not found 
		$data .= '<div>No hay registros!</div>';
	}

	echo $data;
?>
<hr>
