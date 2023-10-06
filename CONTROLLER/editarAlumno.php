<?php
require_once "../MODEL/conectar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $id_carrera = $_POST["id_carrera"];

    // Realiza una consulta SQL para obtener los valores actuales del alumno
    $sql_select = "SELECT rut, nombre, apellido, id_carrera FROM alumnos WHERE rut=?";
    if ($stmt_select = mysqli_prepare($link, $sql_select)) {
        mysqli_stmt_bind_param($stmt_select, "s", $rut);
        if (mysqli_stmt_execute($stmt_select)) {
            mysqli_stmt_store_result($stmt_select);
            mysqli_stmt_bind_result($stmt_select, $rut_actual, $nombre_actual, $apellido_actual, $id_carrera_actual);
            if (mysqli_stmt_fetch($stmt_select)) {
                // Si se encuentra un alumno con el rut especificado, actualiza los datos
                $sql_update = "UPDATE alumnos SET nombre=?, apellido=?, id_carrera=? WHERE rut=?";
                if ($stmt_update = mysqli_prepare($link, $sql_update)) {
                    mysqli_stmt_bind_param($stmt_update, "ssis", $nombre, $apellido, $id_carrera, $rut);
                    if (mysqli_stmt_execute($stmt_update)) {
                        header("location: ../VIEW/alumnos.php");
                    } else {
                        echo "Oops! Something went wrong with the update. Please try again later.";
                    }
                    mysqli_stmt_close($stmt_update);
                }
            } else {
                echo "No se encontró ningún alumno con el rut especificado.";
            }
        } else {
            echo "Oops! Something went wrong with the select. Please try again later.";
        }
        mysqli_stmt_close($stmt_select);
    }
}

mysqli_close($link);

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
    <title>Ingresar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Edicion de alumno</h2>
        <form action="<?php echo
                        htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>RUT</label>
                <input type="text" name="rut" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>ID Carrera</label>
                <input type="number" name="id_carrera" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
        </form>
    </div>
</body>

</html>