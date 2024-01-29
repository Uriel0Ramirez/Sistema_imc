<?php
	// include Database connection file 
	include("../ajax/db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							
							<th>Vacuna</th>
							<th>Dosis</th>
							<th>Edad</th>
							<th>Fecha</th>
							<th>Eliminar</th>
						</tr>';
						session_start(); 
						$id_menor = $_SESSION['id_menor'];
						

						
						
	$query = "SELECT * FROM vacuna WHERE id_menor='$id_menor'";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
			
				<td>'.$row['nombre'].'</td>
				<td>'.$row['dosis'].'</td>
				<td>'.$row['edad_aplicacion'].'</td>
				
				<td>'.$row['fecha_aplicacion'].'</td>
				
				<td>
					<button onclick="DeleteUser('.$row['id_vacuna'].')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
				</td>
    		</tr>';
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