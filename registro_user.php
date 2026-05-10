<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password_hash')";

    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Usuario creado'); window.location='login.php';</script>";
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conexion) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container mt-5" style="max-width:400px;">
    <div class="card p-4 bg-black text-white shadow">

        <h3 class="text-center mb-3">Nuevo Usuario</h3>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Usuario" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

            <button class="btn btn-success w-100">Registrar</button>
        </form>

        <a href="login.php" class="btn btn-link text-info mt-2">Ir al login</a>

    </div>
</div>

</body>
</html>
