<?php
require_once "../MODEL/conectar.php";
$sql = "SELECT rut,nombre,apellido,id_carrera,estado_cuenta FROM alumnos ";
if ($stmt = mysqli_prepare($link, $sql)) {
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result(
            $stmt,
            $rut,
            $nombre,
            $apellido,
            $id_carrera,
            $estado_cuenta
        );
        while (mysqli_stmt_fetch($stmt)) {
                echo " <tr>
                <th>".$rut."</th>
                <th>".$nombre."</th>
                <th>".$apellido."</th>
                <th>".$id_carrera."</th>
                <th>".$estado_cuenta."</th>
                <th><a class='btn btn-outline-light btn-md px-4' href='../CONTROLLER/borrarAlumno.php?rut=".$rut."'>Eliminar alumno</a></th>
             </tr>";
        }
    } else {
        echo "Oops! algo salio mal D:. Por favor intenta denuevo mas tarde.";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>