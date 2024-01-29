<?php
	// include Database connection file 
	include("../ajax/db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						
						</tr>';

						session_start(); 
						$usuario=$_SESSION['usuario'];
						
						
	$query = "SELECT * FROM userlocal WHERE usuario='$usuario'";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<form>
				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="'.$row['Nombre'].'" required disabled>
				</div>
				<div class="form-group">
					<label for="usuario">Usuario:</label>
					<input type="text" class="form-control" id="usuario" name="usuario" value="'.$row['usuario'].'" required disabled>
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña:</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña" value="'.$row['Contraseña'].'" disabled>
				</div>
				</br>
				<button type="button" onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Actualizar</button>
			</form>';


    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>