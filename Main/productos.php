<?php

include("../BBDD/conexion.php");

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$where = $categoria ? " WHERE categoría = '$categoria'" : '';
$resultado = mysqli_query($conexion, "SELECT id_producto, nombre_producto, precio, url FROM productos_" . $where . " LIMIT 9");


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
</head>
<body class="container-fluid d-flex" >

<div class="row products mx-auto" id="contenido">

<?php

while ($fila = mysqli_fetch_assoc($resultado)) {
  echo '<div class="card" style="width: 14rem;">';
  echo '<div class="card-body">';
  echo '<img src="' . $fila['url'] . '" alt="' . $fila['nombre_producto'] . '" class="card-img-top img-fluid"';
  echo '<h5 class="text-center card-title">' . $fila['nombre_producto'] . '</h5>';
  echo '<p class="card-text">Precio: $' . $fila['precio'] . '</p>';
  echo '<a href="#" class="btn btn-primary mx-auto">Comprar</a>';
  echo '</div>';
  echo '</div>';
}

?>  
<div class="row justify-content-center text-center">
  <div class="col-md-2">
    <nav aria-label="Page navigation example d-flex">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
</body>
</html>