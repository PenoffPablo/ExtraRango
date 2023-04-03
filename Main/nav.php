<?php

include("../BBDD/conexion.php");

$resultado = mysqli_query($conexion, "SELECT id_producto, nombre_producto, precio, url FROM productos_ WHERE categoría = 'monofocal'");

if (!$resultado) {
  die('Error en la consulta: ' . mysqli_error($conexion));
}


mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtraRango</title>
    <script src="../js/main.js"></script>
</head>

<body class="nav">
<div class="accordion " id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <a href="#" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Categorías
      </a>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       
      <h6><a href="productos.php?categoria=monofocal" class="refresh">Monofocales</a></h6><br>
      <h6><a href="productos.php?categoria=bifocal" class="refresh">Bifocales</a></h6>

      </div>
    </div>
  </div>
</div>

</body>
</html>