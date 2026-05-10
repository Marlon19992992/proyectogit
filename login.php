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
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Cyberpunk opcional -->
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="bg-dark text-white">

<div class="container mt-5" style="max-width:400px;">
    <div class="card p-4 shadow-lg bg-black text-white">

        <h3 class="text-center mb-3">Login</h3>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Usuario" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

            <button class="btn btn-primary w-100">Entrar</button>
        </form>

    </div>
</div>

</body>
</html>
