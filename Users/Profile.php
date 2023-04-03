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
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header>
        <?php include_once("../Main/header.php") ?>
    </header>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="card-body">
                        <h3 class="card-title text-center">Información personal</h3>
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-file-person-fill"></i> Nombre de usuario: <?php echo "$nombre  $apellido"; ?></h5>
                            <hr>
                            <h5 class="card-text"><i class="bi bi-envelope-at-fill"></i> Correo electrónico: <?php echo "$email"?></p>
                            <hr>
                            <h5><i class="bi bi-telephone-fill"></i> Teléfono: <?php echo "$telefono"?></h5>
                            <hr>
                            <a href="../Users/change-pass.php"><h5>¿Desea cambiar su contraseña?</h5></a>
                            <a href="../Users/change-phone.php"><h5>¿Desea cambiar su número de teléfono?</h5></a>
                            <a href="../Users/logout.php"><h5>Cerrar Sesión</h5></a>

                            <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Eliminar mi cuenta
                            </button>

                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Cuenta</h5>
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
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>