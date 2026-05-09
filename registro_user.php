<?php
session_start();
include 'db.php';

// (Opcional pero recomendado) proteger acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Limpiar datos
    $username = mysqli_real_escape_string($conexion, trim($_POST['username']));
    $password = trim($_POST['password']);

    // Validación básica
    if (empty($username) || empty($password)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios</div>";
    } else {

        // 🔐 Encriptar contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar usuario
        $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password_hash')";

        if (mysqli_query($conexion, $sql)) {
            echo "<script>alert('Usuario creado correctamente'); window.location='admin.php';</script>";
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conexion) . "</div>";
        }
    }
}
?>
