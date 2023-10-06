<?php
require_once "../MODEL/conectar.php";
$sql = "DELETE FROM alumnos WHERE rut=?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_rut);
    $param_rut = $_GET["rut"];
    if (mysqli_stmt_execute($stmt)) {
        header("location: ../VIEW/alumnos.php");
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>