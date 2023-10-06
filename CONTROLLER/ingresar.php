<?php
session_start();
if (
    isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true
) {
    header("location: ../VIEW/index.php");
    exit;
}
require_once "../MODEL/conectar.php";
$rut = "";
$rut_err = $login_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["rut"]))) {
        $rut_err = "Por favor ingrese sur RUT.";
    } else {
        $rut = trim($_POST["rut"]);
    }
    /*if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese una contraseña.";
    } else {
        $password = trim($_POST["password"]);*/
    }
    
    if (empty($rut_err)) {
        $sql = "SELECT rut FROM alumnos WHERE rut = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param(
                $stmt,
                "s",
                $param_rut
            );
            $param_rut = $rut;
    
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Aquí verificabas la contraseña, pero la hemos eliminado
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["rut"] = $rut;
                    header("location: ../VIEW/index.php");
                } else {
                    $login_err = "El RUT no es válido.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
?>


<!DOCTYPE html>
<html lang="es">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="../VIEW/index.php">Gimnasio USM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" method="post">
                    <li class="nav-item"><a class="nav-link" href="../VIEW/index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../VIEW/lugar.php">Donde estamos?</a></li>
                    <li class="nav-item"><a class="nav-link" href="../VIEW/nosotros.php">Sobre nosotros</a></li>
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo '<p>Bienvenido: ', htmlspecialchars($_SESSION["rut"]), '</p>';
                    } else {
                        echo  '<li class="nav-item"><a class="nav-link" href="../CONTROLLER/ingresar.php">Iniciar Sesion</a></li>';
                        echo  '<li class="nav-item"><a class="nav-link" href="../CONTROLLER/registrar.php">Registrate</a></li>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo '<a href="../CONTROLLER/logout.php"><input type="button" class="register" value="Log out"></a>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

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
        <h2>Ingresar</h2>
        <p>Favor de entregar la infromacion solicitada antes de iniciar Sesión.</p>
        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' .
                $login_err . '</div>';
        }
        ?>
        <form action="<?php echo
                        htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>RUT</label>
                <input type="text" name="rut" class="form-control <?php echo (!empty($rut_err)) ?
                                                                            'is-invalid' : ''; ?>" value="<?php echo $rut; ?>">
                <span class="invalid-feedback"><?php echo $rut_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>¿No tiene una cuenta? <a href="registrar.php">Registrate Aqui</a>.</p>
        </form>
    </div>
</body>

</html>