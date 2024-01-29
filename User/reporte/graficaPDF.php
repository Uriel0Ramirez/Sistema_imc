<?php
require('../fpdf/fpdf.php');
ini_set('memory_limit', '512M'); // Aumentar el límite de memoria
class PDF_Grafica extends FPDF {
  function Grafica($data, $labels, $title) {
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 10, $title, 0, 1, 'C');
    $this->Ln(5);

    // Configuración de la gráfica
    $this->SetFillColor(200, 200, 200);
    $this->SetDrawColor(0, 0, 0);
    $this->SetLineWidth(0.8);

    // Ancho y altura fijos de la gráfica
    $chartWidth = 100;
    $chartHeight = 40; // Valor fijo para la altura

    // Margen superior e izquierdo de la gráfica
    $marginX = $this->GetX() + 10; // Ajuste de 10 unidades para el margen izquierdo
    $marginY = $this->GetY();

    // Dibujar las barras del gráfico y las líneas de cuadrícula
    $barWidth = ($chartWidth - (count($data) - 1) * 2) / count($data);
    $maxValue = max($data);
    $gridColor = array(200, 200, 200);
    $this->SetDrawColor($gridColor[0], $gridColor[1], $gridColor[2]);
    $this->SetLineWidth(0.2);
    $this->SetFillColor(0, 123, 255);

    // Variables para llevar la cuenta de las gráficas dibujadas
    $graficasDibujadas = 0;
    $graficasPorFila = 8;

    // Dibujar las barras del gráfico y las líneas de cuadrícula
    foreach ($data as $key => $value) {
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

      // Incrementar el contador de gráficas dibujadas
      $graficasDibujadas++;

      // Hacer un salto de línea después de dibujar 8 gráficas de barra
      if ($graficasDibujadas % $graficasPorFila == 0) {
        $this->Ln();
        // Verificar si quedan valores restantes
        $valoresRestantes = count($data) - $graficasDibujadas;
        if ($valoresRestantes > 0) {
          // Crear una nueva página para la siguiente gráfica
          $this->AddPage();
          // Reiniciar el contador de gráficas dibujadas
          $graficasDibujadas = 0;

          // Obtener los datos y etiquetas restantes
          $dataRestante = array_slice($data, $graficasDibujadas);
          $labelsRestante = array_slice($labels, $graficasDibujadas);

          // Generar la nueva gráfica con los valores restantes
          $this->Grafica($dataRestante, $labelsRestante, $title);
          return; // Salir de la función para evitar dibujar la cuadrícula y etiquetas nuevamente
        }
      }
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

    foreach ($labels as $key => $label) {
      $x = $marginX + ($barWidth + 2) * $key + ($barWidth / 2);
      $y = $marginY + $chartHeight + 3;

      $this->SetXY($x, $y);
      $this->Cell($barWidth, 5, $label, 0, 0, 'C');
    }
  }
}

// Crear instancia de la clase PDF_Grafica
$pdf = new PDF_Grafica();
$pdf->AddPage();

// Datos de ejemplo para la gráfica
$data = [30, 50, 80, 20, 40, 50, 30, 50, 80, 20, 40, 50, 30, 50, 80, 20, 40, 50, 30, 50, 80, 20, 40, 50, 30, 50, 80, 20, 40, 50];
$labels = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD'];
$title = 'Gráfica de ejemplo';

// Generar la gráfica
$pdf->Grafica($data, $labels, $title);

// Salida del PDF
$pdf->Output();