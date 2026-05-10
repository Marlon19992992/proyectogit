<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE username='$user'";
    $res = mysqli_query($conexion, $query);
    $data = mysqli_fetch_assoc($res);

    if ($data && password_verify($pass, $data['password'])) {
        $_SESSION['usuario'] = $user;
        header("Location: admin.php");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Credenciales incorrectas</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
<div class="container">
    <h2>Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
