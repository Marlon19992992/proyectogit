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

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@600;700&display=swap"
          rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="estilo.css">

</head>

<body>

    <div class="container">

        <!-- NAVBAR -->

        <div class="navbar-bento mb-4">

            <div class="logo">
                CYBER GALLERY
            </div>

            <div class="nav-links">

                <a href="registro.php">
                    Registro
                </a>

            </div>

        </div>

        <!-- GRID BENTO -->

        <div class="bento-grid">

            <!-- HERO -->

            <div class="card-bento bento-large hero-image">

                <img src="img/login-bg.jpg">

                <div class="hero-overlay">

                    <h1 class="hero-title">
                        Bienvenido
                    </h1>

                    <p class="hero-text">

                        Accede al panel futurista
                        de imágenes y administración.

                    </p>

                </div>

            </div>

            <!-- LOGIN -->

            <div class="card-bento bento-medium d-flex flex-column justify-content-center">

                <h2 class="mb-4">
                    Iniciar Sesión
                </h2>

                <p class="mb-4">

                    Ingresa tus credenciales
                    para continuar.

                </p>

                <?php if(isset($error)): ?>

                    <div class="alert alert-danger text-center">

                        <?php echo $error; ?>

                    </div>

                <?php endif; ?>

                <form method="POST">

                    <div class="mb-3">

                        <input type="text"
                               name="username"
                               placeholder="Usuario"
                               required>

                    </div>

                    <div class="mb-3">

                        <input type="password"
                               name="password"
                               placeholder="Contraseña"
                               required>

                    </div>

                    <button class="btn-bento w-100">

                        Entrar

                    </button>

                </form>

                <div class="mt-4 text-center">

                    <a href="registro.php"
                       style="
                       color:#9ca3af;
                       text-decoration:none;
                       ">

                        Crear cuenta

                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>