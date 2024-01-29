<!DOCTYPE html>
<html>
<head>
    <title>Imagen centrada</title>
    <style>
        #contenedor {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        #imagen {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
    <h3>Recomendaciones de peso por parte de la OMS</h3>
    <div id="contenedor">
        <?php
        // Ruta de la imagen
        $rutaImagen = './inicio/CurvaPesoNiña.png';

        // Obtener el ancho y alto de la imagen
        list($ancho, $alto) = getimagesize($rutaImagen);

        // Tamaño máximo deseado para la imagen
        $maxAncho = 800;
        $maxAlto = 800;

        // Calcular el nuevo tamaño manteniendo la proporción
        $nuevoAncho = $ancho;
        $nuevoAlto = $alto;
        if ($ancho > $maxAncho) {
            $nuevoAncho = $maxAncho;
            $nuevoAlto = $alto * ($maxAncho / $ancho);
        }
        if ($nuevoAlto > $maxAlto) {
            $nuevoAlto = $maxAlto;
            $nuevoAncho = $ancho * ($maxAlto / $alto);
        }
        ?>
        <img id="imagen" src="<?php echo $rutaImagen ?>" width="<?php echo $nuevoAncho ?>" height="<?php echo $nuevoAlto ?>">
    </div>
    <small class="d-block text-end mt-3">
      <h5>Consulta Informacion.</h5>
      <a href="https://www.aepap.org/sites/default/files/curvas_oms.pdf">CURVA OMS</a>
    </small>
</body>
</html>
