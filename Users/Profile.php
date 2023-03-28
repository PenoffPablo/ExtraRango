<?php
session_start();
include("../BBDD/conexion.php");

if (isset($_SESSION['id_usuario'])) {
    $user_id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$user_id'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);

        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
        $email = $row["email"];
        $telefono = $row["telefono"];   
    } else {
        echo "Error al obtener los datos del usuario";
    }
} else {
        header('Location: ../Users/login.php');
        exit();
    }

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
    <link rel="stylesheet" href="../css/estilos.css">
</head>


<body>
    <header>
        <?php 
        include_once("../Main/header.php")
        ?>
        </header
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card p-3">

                    <div class="card-body">
                        <h3 class="card-title text-center">Información personal</h3>
                        <div class="card-body"><br>
                        <h5 class="card-title"><i class="bi bi-file-person-fill"></i> Nombre de usuario: <?php echo "$nombre  $apellido"; ?></h5><hr><br>
                        
                        <h5 class="card-text"><i class="bi bi-envelope-at-fill"></i> Correo electrónico: <?php echo "$email"?></p><hr><br>
                      
                        <h5><i class="bi bi-telephone-fill"></i> Teléfono: <?php echo "$telefono"?></h5><hr>
                    </div>
                                <br>
                                <a href="../Users/change-pass.php"><h5>¿Desea cambiar su contraseña?</h5></a><br>
                                
                                <a href="../Users/change-phone.php"><h5>¿Desea cambiar su número de teléfono?</h5></a><br>
                                <a href="../Main/index.php"><h5>Cerrar Sesión</h5><br></a>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Eliminar mi cuenta
</button>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar su cuenta? Esta acción no se puede revertir.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Volver</button>
        <a href="../Users/account-deleted.php"class="btn btn-danger">Eliminar cuenta</a>
      </div>
    </div>
  </div>
</div>
                              
        </div>
    </div>
</div>
</body>
</html>