<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="../css/styles.css" rel="stylesheet" />
    <h2 class="mt-5">Alumnos</h2>
</head>
<body>
    <table class="center mt-3">
        <tr>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>ID Carrera</th>
            <th>Estado</th>
            <th>Eliminar alumno</th>
            <?php
            ?>
        </tr>
        <?php include '../CONTROLLER/alumnos.php'; ?>
    </table>
    <?php
    if (isset($_SESSION["rut"]) && $_SESSION["rut"] == "20.655.826-1") {
        echo '<div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center mt-5">
            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="../CONTROLLER/crearAlumno.php">Añadir alumno</a>' .
            '<a class="btn btn-primary btn-lg px-4 me-sm-3" href="../CONTROLLER/editarAlumno.php">Editar alumno</a>
        </div>';
    }    
    ?>
</body>
</html>
