<?php
require('../fpdf/fpdf.php');

class PDF_Grafica extends FPDF {
  function Grafica($data2, $labels2, $title2) {
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(180, 10, utf8_decode($title2), 1, 1, 'C');


    $this->Ln(5);
    $this->SetFillColor(200, 200, 200);
    $this->SetDrawColor(0, 0, 0);
    $this->SetLineWidth(0.8);
    // Configuración de la gráfica

    // Ancho y altura fijos de la gráfica
    $chartWidth = 160;
    $chartHeight = 40; // Valor fijo para la altura

    // Margen superior e izquierdo de la gráfica
    $marginX = $this->GetX() + 10; // Ajuste de 10 unidades para el margen izquierdo
    $marginY = $this->GetY();

    // Dibujar las barras y las líneas de cuadrícula
    $barWidth = ($chartWidth - (count($data2) - 1) * 2) / count($data2);
    $maxValue = max($data2);
    $gridColor = array(200, 200, 200);
    $this->SetDrawColor($gridColor[0], $gridColor[1], $gridColor[2]);
    $this->SetLineWidth(0.2);
    $this->SetFillColor(0, 123, 255);
    $graficasDibujadas = 0;
    // Dibujar las barras del gráfico y las líneas de cuadrícula
    foreach ($data2 as $key => $value) {
      $barHeight = ($value / $maxValue) * $chartHeight;
      $x = $marginX + ($barWidth + 2) * $key; // Se agrega un espacio de 2 unidades entre las barras
      $y = $marginY + $chartHeight - $barHeight;

      // Dibujar la barra
      $this->Rect($x, $y, $barWidth, $barHeight, 'F');

      // Dibujar la línea de cuadrícula encima de la barra
      $this->SetDrawColor(0, 0, 0);
      $this->Line($x, $y, $x + $barWidth, $y);

      // Mostrar el valor de la barra encima de ella
      $this->SetFont('Arial', 'B', 8);
      $this->SetTextColor(0, 0, 0);
      $this->SetXY($x, $y - 5);
      $this->Cell($barWidth, 5, $value, 0, 0, 'C');
      $graficasDibujadas++;

      // Verificar si se han dibujado 8 gráficas y hacer el salto de línea
    
    }

    // Líneas de cuadrícula adicionales
    $this->SetDrawColor($gridColor[0], $gridColor[1], $gridColor[2]);
    $this->SetLineWidth(0.2);

    // Líneas horizontales
    $numGridLines = 4; // Número de líneas horizontales de la cuadrícula
    $gridInterval = $chartHeight / $numGridLines;

    for ($i = 1; $i < $numGridLines; $i++) {
      $y = $marginY + $chartHeight - ($gridInterval * $i);
      $this->Line($marginX, $y, $marginX + $chartWidth, $y);
    }

    // Líneas verticales (etiquetas del eje X)
    $this->SetLineWidth(0.1);

    foreach ($labels2 as $key => $label) {
      $x = $marginX + ($barWidth + 2) * $key + ($barWidth / 2);
      $y = $marginY + $chartHeight + 3;

      $this->SetXY($x, $y);
      $this->Cell($barWidth, 5, $label, 0, 0, 'C');
    }
  }
}
  /*
function Grafica($data, $labels, $title) {
  $this->SetFont('Arial', 'B', 14);
  $this->Cell(180, 10, utf8_decode($title), 1, 1, 'C');

  $this->Ln(5);

  // Configuración de la gráfica
  $this->SetFillColor(200, 200, 200);
  $this->SetDrawColor(0, 0, 0);
  $this->SetLineWidth(0.1);

  // Ancho y altura fijos de la gráfica
  $chartWidth = 160;
  $chartHeight = 40; // Valor fijo para la altura

  // Margen superior e izquierdo de la gráfica
  $marginX = $this->GetX() + 10; // Ajuste de 10 unidades para el margen izquierdo
  $marginY = $this->GetY();

  // Dibujar las líneas de cuadrícula
  $maxValue = max($data);
  $gridColor = array(200, 200, 200);
  $this->SetDrawColor($gridColor[0], $gridColor[1], $gridColor[2]);
  $this->SetLineWidth(0.2);

  // Líneas de cuadrícula adicionales
  $this->SetDrawColor($gridColor[0], $gridColor[1], $gridColor[2]);
  $this->SetLineWidth(0.2);

  // Líneas horizontales
  $numGridLines = 4; // Número de líneas horizontales de la cuadrícula
  $gridInterval = $chartHeight / $numGridLines;

  for ($i = 1; $i < $numGridLines; $i++) {
      $y = $marginY + $chartHeight - ($gridInterval * $i);
      $this->Line($marginX, $y, $marginX + $chartWidth, $y);
  }

  // Dibujar las líneas de la gráfica
  $lineColor = array(0, 123, 255);
  $this->SetDrawColor($lineColor[0], $lineColor[1], $lineColor[2]);
  $this->SetLineWidth(0.5);

  $numPoints = count($data);
  $pointDistance = $chartWidth / ($numPoints - 1);

  for ($i = 0; $i < $numPoints; $i++) {
      $x = $marginX + ($pointDistance * $i);
      $y = $marginY + $chartHeight - (($data[$i] / $maxValue) * $chartHeight);

      if ($i > 0) {
          $xPrev = $marginX + ($pointDistance * ($i - 1));
          $yPrev = $marginY + $chartHeight - (($data[$i - 1] / $maxValue) * $chartHeight);

          $this->Line($xPrev, $yPrev, $x, $y);
      }

      // Dibujar un círculo en cada punto
      $this->SetFillColor($lineColor[0], $lineColor[1], $lineColor[2]);
      $this->Circle($x, $y, 1);

      // Mostrar el valor del punto
      $this->SetXY($x, $y - 5);
      $this->SetFont('Arial', '', 8);
      $this->Cell($pointDistance, 5, $data[$i], 0, 0, 'C');
  }

  // Líneas verticales (etiquetas del eje X)
  $this->SetLineWidth(0.1);

  foreach ($labels as $key => $label) {
      $x = $marginX + ($pointDistance * $key);
      $y = $marginY + $chartHeight + 3;

      $this->SetXY($x, $y);
      $this->Cell($pointDistance, 5, $label, 0, 0, 'C');
  }
}


  function Circle($x, $y, $r) {
    $this->Ellipse($x, $y, $r, $r);
  }

  function Ellipse($x, $y, $rx, $ry, $style = 'D') {
    if ($style == 'F') {
      $op = 'f';
    } elseif ($style == 'FD' || $style == 'DF') {
      $op = 'B';
    } else {
      $op = 'S';
    }
    $lx = 4 / 3 * ($this->k * $rx);
    $ly = 4 / 3 * ($this->k * $ry);
    $k = $this->k;
    $h = $this->h;
    $this->_out(sprintf(
      '%.2F %.2F m %.2F %.2F %.2F %.2F %.2F %.2F c',
      ($x + $rx) * $k,
      ($h - $y) * $k,
      ($x + $rx) * $k,
      ($h - ($y - $ly)) * $k,
      ($x + $lx) * $k,
      ($h - ($y - $ry)) * $k,
      $x * $k,
      ($h - ($y - $ry)) * $k
    ));
    $this->_out(sprintf(
      '%.2F %.2F %.2F %.2F %.2F %.2F c',
      ($x - $lx) * $k,
      ($h - ($y - $ry)) * $k,
      ($x - $rx) * $k,
      ($h - ($y - $ly)) * $k,
      ($x - $rx) * $k,
      ($h - $y) * $k
    ));
    $this->_out(sprintf(
      '%.2F %.2F %.2F %.2F %.2F %.2F c',
      ($x - $rx) * $k,
      ($h - ($y + $ly)) * $k,
      ($x - $lx) * $k,
      ($h - ($y + $ry)) * $k,
      $x * $k,
      ($h - ($y + $ry)) * $k
    ));
    $this->_out(sprintf(
      '%.2F %.2F %.2F %.2F %.2F %.2F c %s',
      ($x + $lx) * $k,
      ($h - ($y + $ry)) * $k,
      ($x + $rx) * $k,
      ($h - ($y + $ly)) * $k,
      ($x + $rx) * $k,
      ($h - $y) * $k,
      $op
    ));
  }
}

*/
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(30,10,'REPORTE E HISTORIAL DE TALLA Y PESO',0,0,'C');

    $this->Ln(9);
    $this->SetFont('Arial','I',9);
    $this->Cell(150,10,'',0, 0,'c',0);
    $fecha = new DateTime(null, new DateTimeZone('America/Mexico_City'));
    $this->Cell(13,6,'Fecha:',0,0,'C');
    $this->Cell(25,6,$fecha->format('d/m/Y'),0,1);  // Agregar la fecha al PDF
    $this->Ln(10);

    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
  
  
}
}
require 'cn_reporte.php';

$id_menor=$_GET['id_menor'];

$consulta = "SELECT * FROM menor WHERE id_menor='$id_menor'";
$resultado = $mysqli->query($consulta);


// Realiza la consulta a la base de datos para obtener los datos de las vacunas

$consultaVacunas = "SELECT * FROM vacuna WHERE id_menor='$id_menor'";
$resultadoVacunas = $mysqli->query($consultaVacunas);



$consultaTallaPeso = "SELECT talla, peso, edad_imc FROM imc_menor WHERE id_menor='$id_menor'";
$resultadoTallaPeso = $mysqli->query($consultaTallaPeso);
$clave_secreta = 'clave_secreta'; // Reemplaza 'tu_clave_secreta' con tu

$edades = array();
$pesos = array();
$talla = array();
while ($fila = $resultadoTallaPeso->fetch_assoc()) {
  $edades[] =  $fila['edad_imc'];
   $pesos[] = $fila['peso'];
   $talla[] = $fila['talla'];
}


$pdf = new PDF_Grafica();   
$pdf->AddPage();
$pdf->AliasNbPages();




$pdf->SetFont('Times','B',13);
    $pdf->Cell(180,10,'FICHA DE HISTORIAL DE PESO Y TALLA ',1, 1,'C',0);

 
while($row = $resultado->fetch_assoc()){
    
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(180,10,'INFORMACION DE MENOR  ',1, 1,'C',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(19,10,'Nombres',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(38, 10, openssl_decrypt($row['nombre'], 'AES-256-CBC', $clave_secreta, 0, '1234567890123456'), 1, 0, 'c', 0);
    //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Apellido Paterno',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(28, 10, openssl_decrypt($row['apellido_p'], 'AES-256-CBC', $clave_secreta, 0, '1234567890123456'), 1, 0, 'c', 0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Apellido Materno',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(29, 10, openssl_decrypt($row['apellido_m'], 'AES-256-CBC', $clave_secreta, 0, '1234567890123456'), 1, 1, 'c', 0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Edad',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
 
    $pdf->Cell(57, 10, utf8_decode($row['edad'] . ' años'), 1, 1, 'c');
    
}
$pdf->Ln(10);

if ($resultadoVacunas->num_rows > 0) {
    // Recorre los registros y agrega los datos a la tabla
    $pdf->SetFont('Times','B',10);
        $pdf->Cell(180,10,'HISTORIAL DE VACUNAS  ',1, 1,'C',0);
     
        $pdf->Cell(45,10,'Nombre  ',1, 0,'C',0);
        
        $pdf->Cell(45,10,'No.Dosis  ',1, 0,'C',0);
       
        $pdf->Cell(45,10,'Edad  ',1, 0,'C',0);
        
        $pdf->Cell(45,10,'Fecha ',1, 1,'C',0);
    while ($vacuna = $resultadoVacunas->fetch_assoc()) {
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(45, 10, $vacuna['nombre'], 1, 0, 'C');
        $pdf->Cell(45, 10, $vacuna['dosis'], 1, 0, 'C');
        $pdf->Cell(45, 10, utf8_decode($vacuna['edad_aplicacion'] . ' años'), 1, 0, 'C'); // Utiliza utf8_decode para manejar la codificación
        

        $pdf->Cell(45, 10, $vacuna['fecha_aplicacion'], 1, 1, 'C');
        
    
    }
} 
else {
    // No se encontraron registros de vacunas
    $pdf->Cell(180, 10, 'No se encontraron registros de vacunas.', 1, 1, 'C');
}

if ($resultadoTallaPeso->num_rows > 0) {
$pdf->Ln(10);
$title = 'Gráfica de Peso';
$pdf->Grafica($pesos, $edades, $title);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 12, '', true, 'UTF-8');
$pdf->Cell(180, 10, utf8_decode('AÑOS'), 1, 1, 'C'); // Utiliza utf8_decode para manejar la codificación


$pdf->Ln(10);

$title = 'Gráfica de Talla';
$pdf->Grafica($talla, $edades, $title);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 12, '', true, 'UTF-8');
$pdf->Cell(180, 10, utf8_decode('AÑOS'), 1, 1, 'C'); // Utiliza utf8_decode para manejar la codificación

$pdf->Ln(10);
}
else {
    // No se encontraron registros de vacunas
    $pdf->Ln(10);
    $pdf->Cell(180, 10, 'No se encontraron registros de Peso y Talla.', 1, 1, 'C');
}

$pdf->Output();

?>