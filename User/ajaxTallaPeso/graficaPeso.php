<?php
	// include Database connection file 
  include("../ajax/db_connection.php");

	// Design initial table header 

  	
	
  $id_menor = $_SESSION['id_menor'];
						
  $query = "SELECT * FROM imc_menor WHERE id_menor='$id_menor'";
   // while($filaA1=$resA1->fetch_array(MYSQL_BOTH))
// {
   //     $A1="{ name:'".$filaA1['talla']."', y:".$cntA1."},";
  // }

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        $talla = "";
        $peso = "";
      $edads = "";
    	while($row = mysqli_fetch_assoc($result))
    	{
           
            $talla.=''.$row['talla'].',';


            $peso.=''.$row['peso'].',';
          $edads.=''.$row['edad_imc'].',';
                  
        $number++;
       
    	
    	
    	
    	}
    }
    else
    {
    	// records now found 
    	
    }

    //echo $a1=$data
    //echo $talla;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.highcharts.com/highcharts.js"></script>
   
</head>
<body>
<!----<div id="container" style="height: 300px"></div>
<div id="container2" style="height: 300px"></div>-->
<?php //echo $grafica1;?>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="grafica1"></canvas>

  <script>
    // Obtener el canvas y crear el contexto
    var ctx = document.getElementById('grafica1').getContext('2d');

    // Crear los datos de la gráfica
    var data = {
      labels: [<?php echo $edads; ?>],
      datasets: [{
        label: 'Peso',
        data: [<?php echo $peso; ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
         
         
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 3
      }]
    };

    // Configurar la gráfica
    var options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    };

    // Crear la gráfica
    var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: options
    });
  </script>
  