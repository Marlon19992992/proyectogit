<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = mysqli_connect("localhost", "root", "", "carrusel");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>