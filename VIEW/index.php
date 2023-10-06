<?php

require_once('header.php');

?>
<!DOCTYPE html>
<html lang="es">
<meta>
<link href="../css/styles.css" rel="stylesheet" />
</meta>

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
    </main>
</body>

</html>