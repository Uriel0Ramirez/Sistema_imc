<?php
require('../fpdf/fpdf.php');


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

$id_usuario=$_GET['id_usuario'];

$consulta = "SELECT * FROM misdatos WHERE id_usuario='$id_usuario'";
$resultado = $mysqli->query($consulta);

// Realiza la consulta a la base de datos para obtener los datos de las vacunas

$consultaVacunas = "SELECT * FROM vacunas WHERE id_usuarioVa = '$id_usuario'";
$resultadoVacunas = $mysqli->query($consultaVacunas);

$consultaTallaPeso = "SELECT  talla, peso, edad FROM tallapeso WHERE id_usuario = '$id_usuario'";
$resultadoTallaPeso = $mysqli->query($consultaTallaPeso);



$edades = array();
$pesos = array();

while ($fila = $resultadoTallaPeso->fetch_assoc()) {
    $edades[] = $fila['edad'];
    $pesos[] = $fila['peso'];
}

$pdf = new PDF_Grafica();
$pdf->AddPage();

$title = 'Gráfica de Talla y Peso';

$pdf->Grafica($pesos, $edades, $title);

$pdf->Output();


// Verifica si se encontraron registros de vacunas

// Creación del objeto de la clase heredada
/*
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

while($row = $resultado->fetch_assoc()){
    
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(180,10,'INFORMACION DE TUTOR  ',1, 1,'C',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(19,10,'Nombres',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(38, 10, $row['Nombre'],1, 0,'c',0);
    //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Apellido Paterno',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(28, 10, $row['apelli_Paterno'],1, 0,'c',0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Apellido Materno',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(29, 10, $row['apelli_Materno'],1, 1,'c',0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Edad',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
 
    $pdf->Cell(57, 10, utf8_decode($row['edadtutor'] . ' años'), 1, 0, 'c');
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Parentesco',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(57, 10, $row['parentesco_tutor'],1, 1,'c',0);
    //USUARIO
    $pdf->Ln(10);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(180,10,'INFORMACION DEL MENOR  ',1, 1,'C',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(19,10,'Nombres',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(38, 10, $row['Nombre_menor'],1, 0,'c',0);
    //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Apellido Paterno',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(28, 10, $row['apellidoPater_menor'],1, 0,'c',0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,10,'Apellido Materno',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(29, 10, $row['apellidoMaterno_Menor'],1, 1,'c',0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,10,'Edad de Registro',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(130, 10, utf8_decode($row['edad_Menor'] . ' años'), 1, 1, 'c'); // Utiliza utf8_decode para manejar la codificación
      //UBICACION
    $pdf->Ln(10);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(180,10,'INFORMACION DEL DOMICILIO  ',1, 1,'C',0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,10,'Codigo Postal',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(20, 10, $row['cp'],1, 0,'c',0);
    //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(22,10,'Municipio',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(50, 10, $row['municipio'],1, 0,'c',0);
       //
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(22,10,'Localidad',1, 0,'c',0);
    $pdf->SetFont('Courier','I',9);
    $pdf->Cell(36, 10, $row['localidad'],1, 1,'c',0);
    $pdf->Ln(15);
}
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
        $pdf->Cell(45, 10, $vacuna['vacuna'], 1, 0, 'C');
        $pdf->Cell(45, 10, $vacuna['dosis'], 1, 0, 'C');
        $pdf->Cell(45, 10, utf8_decode($vacuna['edad'] . ' años'), 1, 0, 'C'); // Utiliza utf8_decode para manejar la codificación
        

        $pdf->Cell(45, 10, $vacuna['Fecha'], 1, 1, 'C');
        
    
    }
} else {
    // No se encontraron registros de vacunas
    $pdf->Cell(180, 10, 'No se encontraron registros de vacunas.', 1, 1, 'C');
}
*/

$pdf->Output();
?>