<body class="bg-dark text-white">

<div class="container mt-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold">⚡ PANEL DE CONTROL</h1>

        <div>
            <a href="index.php" class="btn btn-primary me-2" target="_blank">Ver Carrusel</a>
            <a href="registro_user.php" class="btn btn-success me-2">Nuevo Usuario</a>
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>

    <!-- SUBIR IMAGEN -->
    <div class="card p-4 mb-5 shadow bg-black text-white">

        <h3 class="mb-4 text-center">📤 Subir Nueva Imagen</h3>

        <form action="subir.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Nombre de la imagen</label>
                <input type="text" name="nombre_personalizado" 
                       class="form-control" placeholder="Ej: paisaje cyberpunk" required>
            </div>

            <div class="mb-3">
                <input type="file" name="imagen" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                🚀 Subir Imagen
            </button>
        </form>
    </div>

    <!-- TABLA -->
    <h3 class="mb-3">🖼️ Gestión de Imágenes</h3>

    <div class="card p-3 bg-black">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Vista</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td>
                        <img src="<?php echo $row['ruta']; ?>" width="80" style="border-radius:10px;">
                    </td>
                    <td>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Eliminar imagen?')">
                           🗑️ Eliminar
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>

</body>