<?php
$conexion = mysqli_connect('localhost', 'root', '', 'tienda_online');

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>