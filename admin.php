<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$resultado = mysqli_query($conexion, "SELECT * FROM imagenes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Panel de Administración</title>

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

    <div class="navbar-bento">

        <div class="logo">

            ADMIN PANEL

        </div>

        <div class="nav-links">

            <a href="index.php">
                Ver Galería
            </a>

            <a href="registro_user.php">
                Nuevo Usuario
            </a>

            <a href="logout.php">
                Salir
            </a>

        </div>

    </div>

    <!-- GRID -->

    <div class="bento-grid">

        <!-- SUBIR IMAGEN -->

        <div class="card-bento bento-medium">

            <h2 class="mb-4">

                Subir Imagen

            </h2>

            <p class="mb-4">

                Agrega nuevas imágenes
                al carrusel dinámico.

            </p>

            <form action="subir.php"
                  method="POST"
                  enctype="multipart/form-data">

                <div class="mb-3">

                    <input type="text"
                           name="nombre_personalizado"
                           placeholder="Nombre de la imagen"
                           required>

                </div>

                <div class="mb-4">

                    <input type="file"
                           name="imagen"
                           required>

                </div>

                <button type="submit"
                        class="btn-bento w-100">

                    Subir Imagen

                </button>

            </form>

        </div>

        <!-- STATS -->

        <div class="card-bento bento-small d-flex flex-column justify-content-center">

            <div class="stat-number">

                <?php echo mysqli_num_rows($resultado); ?>

            </div>

            <div class="stat-label">

                Imágenes registradas

            </div>

        </div>

        <!-- INFO -->

        <div class="card-bento bento-small glass">

            <h3 class="mb-3">

                Sistema AJAX

            </h3>

            <p>

                Panel dinámico con
                sustitución de nodos
                y renderizado visual moderno.

            </p>

        </div>

    </div>

    <!-- TITULO -->

    <div class="mt-5 mb-4">

        <h2>

            Gestión de Imágenes

        </h2>

    </div>

    <!-- GRID DE IMAGENES -->

    <div class="bento-grid">

        <?php while($row = mysqli_fetch_assoc($resultado)): ?>

        <div class="card-bento bento-small">

            <!-- IMAGEN -->

            <div style="
                overflow:hidden;
                border-radius:20px;
                margin-bottom:20px;
            ">

                <img src="<?php echo $row['ruta']; ?>"
                     class="bento-img"
                     style="
                     height:220px;
                     width:100%;
                     object-fit:cover;
                     ">

            </div>

            <!-- INFO -->

            <div class="mb-3">

                <p class="mb-1">

                    ID:
                    <?php echo $row['id']; ?>

                </p>

                <h4>

                    <?php echo $row['nombre']; ?>

                </h4>

            </div>

            <!-- BOTONES -->

            <div class="d-flex gap-2">

                <a href="eliminar.php?id=<?php echo $row['id']; ?>"
                   class="btn-bento w-100 text-center"
                   style="
                   background:#ef4444;
                   text-decoration:none;
                   "
                   onclick="return confirm('¿Eliminar imagen?')">

                    Eliminar

                </a>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</div>

</body>

</html>