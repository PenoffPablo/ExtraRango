<?php 
session_start();
include("../BBDD/conexion.php");

if (!$conexion) {
    echo "no se pudo conectar a la base de datos";
}
$id_usuario = $_SESSION['id_usuario'];

$sql = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";

if (mysqli_query($conexion, $sql)) {

    session_unset();
    session_destroy();
    header('Location: ../Main/index.php');
    exit();

} else {
    echo "Error al eliminar los datos del usuario: " . mysqli_error($conexion);
}



?>