<?php
include 'db.php';

$id = $_GET['id'];

$res = mysqli_query($conexion, "SELECT ruta FROM imagenes WHERE id=$id");
$data = mysqli_fetch_assoc($res);

if ($data && file_exists($data['ruta'])) {
    unlink($data['ruta']);
}

mysqli_query($conexion, "DELETE FROM imagenes WHERE id=$id");

header("Location: admin.php");
?>