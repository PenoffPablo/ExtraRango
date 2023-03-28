<?php
session_start();
include("conexion.php");

$name = $_POST['name'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

$val= "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($conexion, $val);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($name) || empty($lastName) || empty($email) || empty($phone) || empty($pass)) {
        die('Por favor, complete todos los campos del formulario.');
        exit;
    }
   else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h1>El correo electrónico $email no es válido</h1><br>";
        exit;
    }
   else if (mysqli_num_rows($result) > 0) {
        echo "El correo seleccionado ya está registrado";
        exit;

}
}



$sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, contraseña) VALUES (?, ?, ?, ?, ?)";
$sentencia = mysqli_prepare($conexion, $sql);

if (!$sentencia) {
    die('Error al preparar la consulta: ' . mysqli_error($conexion));
}

mysqli_stmt_bind_param($sentencia, "sssss", $name, $lastName, $email, $phone, $hashed_password);

if (mysqli_stmt_execute($sentencia)) {
    $registroExitoso = true;
    header("../Main/index.php");
} else {
    echo 'Error al guardar los datos: ' . mysqli_error($conexion);
}

mysqli_stmt_close($sentencia);
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>ExtraRango</title>
</head>
<body style="height: 100%;">
<?php if ($registroExitoso) : ?>
    <div class="d-flex align-items-center justify-content-center">
  <div class="card text-center alert alert-success" role="alert">
    <div class="card-body ">
    <div>
  <h3>Registro exitoso <i class="bi bi-check-lg"></i></h3>
</div>

    </div>
  </div>
</div>
<div class="d-flex align-items-center justify-content-center">
<a href="../Main/index.php" class="btn btn-primary mx-2 mb-2" >Volver al inicio</a>
</div>


<?php endif; ?>



<script>
  // Obtener el elemento de registro exitoso
  const registerSuccess = document.getElementById('register-success');
  
  // Si el elemento existe y la consulta se ejecutó correctamente, mostrar el mensaje
  if (registerSuccess && '<?php echo $registroExitoso ? "1" : "0"; ?>' === '1') {
    registerSuccess.classList.remove('d-none');
  }
</script>
</body>
</html>