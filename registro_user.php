<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conexion, trim($_POST['username']));
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<div class='alert alert-danger text-center'>Todos los campos son obligatorios</div>";
    } else {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

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

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuente cyberpunk -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tu estilo -->
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<div class="container mt-5" style="max-width: 400px;">
    <div class="card p-4 shadow">

        <h3 class="text-center glow mb-3">Nuevo Usuario</h3>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Usuario" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

            <button type="submit" class="btn btn-success w-100">Guardar Usuario</button>
        </form>

        <a href="admin.php" class="btn btn-link w-100 mt-2">Volver</a>

    </div>
</div>

</body>
</html>
