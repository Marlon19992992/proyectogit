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
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar</title>
</head>

<body>
<h2>Crear usuario</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrar</button>
</form>

</body>
</html>
