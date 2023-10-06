<?php
require_once "../MODEL/conectar.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO alumnos (nombre, apellido, id_carrera) VALUES(?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssi",$param_rut, $param_nombre, $param_apellido, $param_id_carrera);
        $param_rut = $_POST["rut"];
        $param_nombre = $_POST["nombre"];
        $param_apellido = $_POST["apellido"];
        $param_id_carrera = $_POST["id_carrera"];

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../VIEW/alumnos.php");
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($link);
?>
<?php
require_once('../VIEW/header.php');
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
        <h2>Creacion de alumno</h2>
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