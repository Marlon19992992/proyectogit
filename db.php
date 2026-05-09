<?php
$conexion = mysqli_connect("localhost", "root", "", "carrusel");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>