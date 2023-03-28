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

<h2 class="text-center mb-4">Cambiar contraseña</h2>

	<form action="../Users/change-pass.php" method="post">

		<label for="password_actual">Contraseña actual:</label>
		<input type="password" id="password_actual" name="password_actual"><br><br>
		<label for="password_nueva">Nueva contraseña:</label>
		<input type="password" id="password_nueva" name="password_nueva"><br><br>
        <div class="d-flex align-items-center justify-content-center">
		<input type="submit" class="btn btn-primary" value="Cambiar contraseña">
</div>
	</form>
    </div>
</body>
</html>

<?php

$id_usuario = $_SESSION['id_usuario'];


$password_actual = isset($_POST['password_actual']) ? $_POST['password_actual'] : "";
$password_nueva = isset($_POST['password_nueva']) ? $_POST['password_nueva'] : "";


$query = "SELECT contraseña FROM usuarios WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
	$fila = mysqli_fetch_assoc($resultado);
	$password_bd = $fila['contraseña'];

	
	if (password_verify($password_actual, $password_bd)) {

		if (strlen($password_nueva) >= 8) {

			$password_encriptada = password_hash($password_nueva, PASSWORD_DEFAULT);

			$query = "UPDATE usuarios SET contraseña = '$password_encriptada' WHERE id_usuario = $id_usuario";
			mysqli_query($conexion, $query);
			echo '<h3 class="alert alert-success mt-3 text-center">Contraseña actualizada correctamente</h3>';
		} else {
			echo "La nueva contraseña debe tener al menos 8 caracteres";
		}
	}
} else {
	echo "Error al obtener la contraseña actual";
}
mysqli_close($conexion);
?>
