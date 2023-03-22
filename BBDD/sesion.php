<?php
session_start();

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

  $sql = "SELECT * FROM usuarios WHERE email = ?";
  $stmt = mysqli_prepare($conexion, $sql);

  if (!$stmt) {
    echo 'Error al preparar la consulta: ' . mysqli_error($conexion);
    exit;
  }

  mysqli_stmt_bind_param($stmt, 's', $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (!$result || mysqli_num_rows($result) === 0) {
    echo 'Correo electrónico o contraseña incorrectos.';
    exit;
  }

  $user = mysqli_fetch_assoc($result);

  if (!password_verify($password, $user['contraseña'])) {
    echo 'Correo electrónico o contraseña incorrectos.';
    exit;
  }

  $_SESSION['email'] = $user['email'];

  header('Location: ../Main/index.php');

  exit;
}
?>

