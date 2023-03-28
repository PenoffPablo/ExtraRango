<?php
session_start();

include("../BBDD/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $contraseña = $_POST['password'];
  if (empty($email) || empty($contraseña)) {
      echo 'Por favor complete todos los campos.';
      exit;
  }

  if (!$conexion) {
      echo 'Error al conectar a la base de datos.';
      exit;
  }
  $sql = "SELECT * FROM usuarios WHERE email = ?";
  $stmt = mysqli_prepare($conexion, $sql);
  if (!$stmt) {
      echo 'Error al preparar la consulta: ' . mysqli_error($conexion);
      exit;
  }
  mysqli_stmt_bind_param($stmt, 's', $email);
  mysqli_stmt_execute($stmt);
  $resultado = mysqli_stmt_get_result($stmt);
  if (!$resultado || mysqli_num_rows($resultado) === 0) {
      echo 'Correo electrónico o contraseña incorrectos.';
      exit;
  }
  $usuario = mysqli_fetch_assoc($resultado);
  if (!password_verify($contraseña, $usuario['contraseña'])) {
      echo 'Correo electrónico o contraseña incorrectos.';
      exit;
  }
  $_SESSION['id_usuario'] = $usuario['id_usuario'];
  header('Location: ../Main/index.php');
  exit;
}
?>