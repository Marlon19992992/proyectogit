<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre_personalizado'];
    $archivo = $_FILES['imagen'];

    $carpeta = "img/";

    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $ruta = $carpeta . time() . "_" . $archivo['name'];

    if (move_uploaded_file($archivo['tmp_name'], $ruta)) {
        mysqli_query($conexion, "INSERT INTO imagenes (nombre, ruta) VALUES ('$nombre', '$ruta')");
    }
}

header("Location: admin.php");
?>