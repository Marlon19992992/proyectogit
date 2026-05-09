<?php
session_start();

if ($_POST) {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];

    if ($user == "admin" && $pass == "1234") {
        $_SESSION['usuario'] = $user;
        header("Location: admin.php");
        exit();
    } else {
        echo "Credenciales incorrectas";
    }
}
?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Entrar</button>
</form>
