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
$img_perfil = $_FILES["imagen"]["tmp_name"];
$tipo_archivo = $_FILES["imagen"]["type"];
$contenido_img = file_get_contents($img_perfil);
$Extensiones_permitidas = array('png', 'jpg');
$fileExtension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($name) || empty($lastName) || empty($email) || empty($phone) || empty($pass) || empty($img_perfil)) {
        die('Por favor, complete todos los campos del formulario.');
        exit;
    }
   else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h1>El correo electrónico $email no es válido</h1><br>";
        exit;
    }
    if (!in_array($fileExtension, $Extensiones_permitidas)) {
        echo "<h1>Error: Solo se permiten archivos PNG y JPG.</h1>";
        exit;
      }
}

$sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, contraseña, img_perfil,tipo_archivo) VALUES (?, ?, ?, ?, ?, ?, ?)";
$sentencia = mysqli_prepare($conexion, $sql);

if (!$sentencia) {
    die('Error al preparar la consulta: ' . mysqli_error($conexion));
}

mysqli_stmt_bind_param($sentencia, "ssssssb", $name, $lastName, $email, $phone, $pass, $contenido_img, $tipo_archivo);

if (mysqli_stmt_execute($sentencia)) {
    echo 'Los datos se han guardado correctamente.';
} else {
    echo 'Error al guardar los datos: ' . mysqli_error($conexion);
}

mysqli_stmt_close($sentencia);
mysqli_close($conexion);
?>