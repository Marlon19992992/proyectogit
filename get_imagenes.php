<?php
include 'db.php';

$query = "SELECT nombre, ruta FROM imagenes ORDER BY id DESC";
$res = mysqli_query($conexion, $query);

$imagenes = [];

while ($row = mysqli_fetch_assoc($res)) {
    $imagenes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($imagenes);
exit();
?>
