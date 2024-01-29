<?php
  if (isset($_POST['vacuna']) && isset($_POST['dosis']) && isset($_POST['edadVacuna'])) {
    // Incluir archivo de conexión a la base de datos
    include("../ajax/db_connection.php");

    // Obtener los valores a verificar
    $vacuna = $_POST['vacuna'];
    $dosis = $_POST['dosis'];
    $edadVacuna = $_POST['edadVacuna'];

    // Consultar la base de datos para verificar si la vacuna ya existe
    $query = "SELECT * FROM vacuna WHERE nombre = '$vacuna' AND dosis = '$dosis' AND edad_aplicacion = '$edadVacuna'";
    if (!$result = mysqli_query($con, $query)) {
      exit(mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
      // La vacuna ya existe con la misma dosis y edad
      echo "existe";
    } else {
      // La vacuna no existe o tiene diferente dosis y edad
      echo "no_existe";
    }
  }
?>
