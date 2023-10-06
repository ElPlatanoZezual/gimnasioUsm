<?php

require_once('header.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="Jack Banana" content="" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <title>Gimnasio USM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">No ejercites solo la mente</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Solo necesitas ser estudiante para poder asistir!!</p>
                            <?php
                            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            echo 
                                '<div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="../VIEW/productos.php" >Registra tu hora</a>
                                </div>';
                            }
                            else {
                                echo '<div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="../CONTROLLER/registrar.php" >Crear cuenta</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="../CONTROLLER/ingresar.php"> Iniciar sesion</a>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="../images\gymIndex.jpg" alt="..." /></div>
                </div>
            </div>
        </header>
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">La mejor forma de comer, de forma ilegal.</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                <h2 class="h5">Que somos</h2>
                                <p class="mb-0">Somos una pequeña Pyme que se vende Hamburguesas dentro de la localidad.</p>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                <h2 class="h5">Lugar de Venta</h2>
                                <p class="mb-0">Vendemos dentro de la Universidad, mas encima nos encontramos en tu propio lugar de estudios.</p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Servicios</h2>
                                <p class="mb-0">Venta de Hamburguesas hechas completamente de forma casera, nada de carne falso aca, 100% carne.</p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h2 class="h5">No tengo efectivo ¿Tarjeta Aceptan?</h2>
                                <p class="mb-0">Efectivamente, se aceptan tarjetas de todo tipo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>