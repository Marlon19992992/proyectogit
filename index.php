<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Cyber Gallery</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@600;700&display=swap"
          rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="estilo.css">

    <!-- JQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <div class="container">

        <!-- NAVBAR -->

        <div class="navbar-bento">

            <div class="logo">
                CYBER GALLERY
            </div>

            <div class="nav-links">

                <a href="admin.php">
                    Panel
                </a>

                <a href="logout.php">
                    Salir
                </a>

            </div>

        </div>

        <!-- GRID BENTO -->

        <div class="bento-grid">

            <!-- HERO PRINCIPAL -->

            <div class="card-bento bento-large hero-image">

                <!-- CONTENEDOR AJAX -->

                <div id="contenedor-ajax"
                     style="
                     width:100%;
                     height:100%;
                     min-height:600px;
                     position:relative;
                     overflow:hidden;
                     border-radius:24px;
                     ">

                    <div class="d-flex justify-content-center align-items-center h-100">

                        <div class="text-center">

                            <h2 class="mb-3">
                                Cargando galería...
                            </h2>

                            <p>
                                Conectando con el servidor
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- INFO -->

            <div class="card-bento bento-small d-flex flex-column justify-content-between">

                <div>

                    <p class="mb-2">
                        Imagen actual
                    </p>

                    <h3 id="nombre-foto">

                        Esperando...

                    </h3>

                </div>

                <div class="mt-4">

                    <div id="contador"
                         class="stat-label">

                        Cargando...

                    </div>

                </div>

            </div>

            <!-- BOTONES -->

            <div class="card-bento bento-small d-flex flex-column justify-content-center">

                <button class="btn-bento mb-3"
                        id="btn-prev">

                    ⬅ Anterior

                </button>

                <button class="btn-bento"
                        id="btn-next">

                    Siguiente ➡

                </button>

            </div>

            <!-- EXTRA -->

            <div class="card-bento bento-medium glass">

                <h3 class="mb-3">

                    Galería Futurista

                </h3>

                <p>

                    Proyecto AJAX con sustitución dinámica
                    de nodos DOM en tiempo real usando
                    JQuery y PHP.

                </p>

            </div>

        </div>

    </div>

<script>

$(document).ready(function() {

    let imagenes = [];

    let indiceActual = 0;

    // ==============================
    // CARGA INICIAL
    // ==============================

    function cargarServidor() {

        $.ajax({

            url: 'get_imagenes.php',

            type: 'GET',

            dataType: 'json',

            success: function(data) {

                imagenes = data;

                if(imagenes.length > 0) {

                    actualizarNodo(0);
                }
            },

            error: function() {

                $('#contenedor-ajax').html(`

                    <div class="d-flex 
                                justify-content-center 
                                align-items-center 
                                h-100">

                        <div class="text-center">

                            <h2>Error</h2>

                            <p>
                                No se pudo conectar
                                con el servidor
                            </p>

                        </div>

                    </div>

                `);
            }
        });
    }

    // ==============================
    // SUSTITUCIÓN DE NODOS
    // ==============================

    function actualizarNodo(index) {

        const foto = imagenes[index];

        // ELIMINA NODO ANTERIOR

        $('#contenedor-ajax').empty();

        // ID ÚNICO

        const timestamp = new Date().getTime();

        // NUEVO NODO

        const nuevaImagen = `

            <div class="hero-image fade-up">

                <img src="${foto.ruta}"
                     id="img-node-${timestamp}"
                     class="bento-img"
                     alt="${foto.nombre}">

                <div class="hero-overlay">

                    <h1 class="hero-title">

                        ${foto.nombre}

                    </h1>

                    <p class="hero-text">

                        Imagen dinámica cargada
                        desde el servidor usando AJAX.

                    </p>

                </div>

            </div>

        `;

        // INSERTAR NUEVO NODO

        $('#contenedor-ajax').append(nuevaImagen);

        // TEXTOS

        $('#nombre-foto').text(foto.nombre);

        $('#contador').text(

            `FOTO ${index + 1} DE ${imagenes.length}`

        );
    }

    // ==============================
    // BOTONES
    // ==============================

    $('#btn-next').click(function() {

        indiceActual =

            (indiceActual + 1) % imagenes.length;

        actualizarNodo(indiceActual);
    });

    $('#btn-prev').click(function() {

        indiceActual =

            (indiceActual - 1 + imagenes.length)
            % imagenes.length;

        actualizarNodo(indiceActual);
    });

    // ==============================
    // INICIAR
    // ==============================

    cargarServidor();

});

</script>

</body>

</html>