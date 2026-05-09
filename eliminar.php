<?php
include 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT ruta FROM imagenes WHERE id = $id";
    $res = mysqli_query($conexion, $query);
    $datos = mysqli_fetch_assoc($res);

    if ($datos && file_exists($datos['ruta'])) {
        unlink($datos['ruta']);
    }

    mysqli_query($conexion, "DELETE FROM imagenes WHERE id = $id");
}

header("Location: admin.php");
exit();
?>
