<?php
session_start();

include("base_de_datos.php")

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    echo 'Por favor complete todos los campos.';
    exit;
  }


  $conexion = mysqli_connect('localhost', 'root', '', 'tienda_online');

  if (!$conexion) {
    echo 'Error al conectarse a la base de datos.';
    exit;
  }

  $sql = "SELECT * FROM usuarios WHERE nombre_de_usuario = '$email' AND contraseña = '$password'";
  $result = mysqli_query($conexion, $sql);

  if (!$result || mysqli_num_rows($result) === 0) {
    echo 'Nombre de usuario o contraseña incorrectos.';
    exit;
  }

  // Iniciar sesión para el usuario
  $_SESSION['username'] = $username;

  // Redirigir a la página de inicio de sesión exitoso
  header('Location: index.php');
  exit;
}
?>