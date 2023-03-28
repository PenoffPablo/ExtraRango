<?php
session_start();
include("../BBDD/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtraRango</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <?php
    include_once("../Main/header.php")
    ?>
<div class="card w-50 p-3">

<h2 class="text-center mb-4">Cambiar teléfono</h2>

	<form action="../Users/change-phone.php" method="post">

		<label for="phone_actual">Teléfono actual:</label>
		<input type="phone" id="phone_actual" name="phone_actual"><br><br>
		<label for="phone_nuevo">Nuevo teléfono:</label>
		<input type="phone" id="phone_nuevo" name="phone_nuevo"><br><br>
        <div class="d-flex align-items-center justify-content-center">
		<input type="submit" class="btn btn-primary" value="Cambiar telefono">
</div>
	</form>
    </div>
</body>
</html>

<?php

$id_usuario = $_SESSION['id_usuario'];


$phone_actual = isset($_POST['phone_actual']) ? $_POST['phone_actual'] : "";
$phone_nuevo = isset($_POST['phone_nuevo']) ? $_POST['phone_nuevo'] : "";


$query = "SELECT telefono FROM usuarios WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
	$fila = mysqli_fetch_assoc($resultado);
	$password_bd = $fila['telefono'];

	

		if (strlen($phone_nuevo) >= 9 && strlen($phone_nuevo)<=13) {

			$query = "UPDATE usuarios SET telefono = '$phone_nuevo' WHERE id_usuario = $id_usuario";
			mysqli_query($conexion, $query);
			echo '<h3 class="alert alert-success mt-3 text-center">Teléfono actualizado correctamente</h3>';
		} else {
			echo "El nuevo número de teléfono debe contener entre 9 y 13 caracteres";
		}
	
} else {
	echo "Error al obtener el teléfono actual";
}
mysqli_close($conexion);
?>
