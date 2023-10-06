<?php
session_start();
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

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="../VIEW/index.php">Gimnasio USM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" method="post">
                    <li class="nav-item"><a class="nav-link" href="../VIEW/index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../VIEW/lugar.php">Donde estamos?</a></li>
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo '<li class="nav-item"><a class="nav-link" href="../CONTROLLER/logout.php">Cerrar Sesion</a></li>';
                        if (isset($_SESSION["rut"]) && $_SESSION["rut"] == "20.655.826-1") {
                            echo '<li class="nav-item"><a class="nav-link" href="../VIEW/alumnos.php">Administrar</a></li>';}
                    }else {
                        echo  '<li class="nav-item"><a class="nav-link" href="../CONTROLLER/ingresar.php">Iniciar Sesion</a></li>';
                        echo  '<li class="nav-item"><a class="nav-link" href="../CONTROLLER/registrar.php">Registrate</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

</html>