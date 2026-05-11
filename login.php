<?php
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div class="col-md-5">

        <div class="auth-card">

            <h2 class="text-center mb-4">Login</h2>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Usuario"
                           required>
                </div>

                <div class="mb-4">
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Contraseña"
                           required>
                </div>

                <button class="btn btn-purple w-100 mb-3">
                    Entrar
                </button>

                <a href="registro.php" class="btn btn-outline-light w-100">
                    Crear usuario
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>