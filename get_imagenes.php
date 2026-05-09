<?php
include 'db.php'; 

// Limpia cualquier salida previa
if (ob_get_length()) ob_clean(); 

$query = "SELECT nombre, ruta FROM imagenes ORDER BY id DESC";
$resultado = mysqli_query($conexion, $query);

$imagenes = [];

while ($row = mysqli_fetch_assoc($resultado)) {
    $imagenes[] = $row;
}

// Indicar que es JSON
header('Content-Type: application/json; charset=utf-8');

echo json_encode($imagenes);
exit();
?>

