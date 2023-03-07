<?php


$conexion = mysqli_connect('localhost', 'root', '', 'tienda_online');


if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}


$name = $_POST['name'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];


if (empty($name) || empty($lastName) || empty($email) || empty($phone)|| empty($pass)) {
    die('Por favor, complete todos los campos del formulario.');
}


$sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, contraseña) VALUES ('$name','$lastName', '$email', '$phone', '$pass')";

if (mysqli_query($conexion, $sql)) {
    echo 'Los datos se han guardado correctamente.';
} else {
    echo 'Error al guardar los datos: ' . mysqli_error($conexion);
}


mysqli_close($conexion);

?>