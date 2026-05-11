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
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registrar Usuario</title>

    <!-- Bootstr**ap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@600;700&display=swap"
          rel="stylesheet">

    <!-- Tu CSS -->

    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>

    <div class="container">

        <!-- NAVBAR -->

        <div class="navbar-bento mb-4">

            <div class="logo">
                CYBER GALLERY
            </div>

            <div class="nav-links">

                <a href="login.php">
                    Login
                </a>

            </div>

        </div>

        <!-- GRID BENTO -->

        <div class="bento-grid">

            <!-- CARD PRINCIPAL -->

            <div class="card-bento bento-medium mx-auto"
                 style="max-width: 500px; width:100%;">

                <h2 class="mb-4">
                    Crear Usuario
                </h2>

                <p class="mb-4">
                    Registra una nueva cuenta para acceder
                    al sistema.
                </p>

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

                        Registrar Usuario

                    </button>

                </form>

                <div class="mt-4 text-center">

                    <a href="login.php"
                       style="
                       color:#9ca3af;
                       text-decoration:none;
                       ">

                        Ya tengo una cuenta

                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
</html>

</html>

