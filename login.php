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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuente futurista -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tu CSS -->
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="bg-dark text-white d-flex justify-content-center align-items-center" style="min-height:100vh;">

<div style="width: 100%; max-width: 420px;">
    <div class="card p-4 shadow-lg bg-black text-white">

        <h3 class="text-center mb-4">⚡ LOGIN</h3>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger text-center">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <input type="text" name="username" 
                   class="form-control mb-3" 
                   placeholder="👤 Usuario" required>

            <input type="password" name="password" 
                   class="form-control mb-3" 
                   placeholder="🔒 Contraseña" required>

            <button class="btn btn-primary w-100 mb-2">
                Entrar
            </button>

        </form>

    </div>
</div>

</body>
</html>
