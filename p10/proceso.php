<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $modelo_id = $_POST["modelo_id"];
        $usuario_id = $_POST["usuario_id"];
        $folio = $_POST["folio"];

        $con = mysqli_connect("localhost", "root", "", "autos");
        if (mysqli_connect_errno()) {
            echo "<p class='alert alert-danger'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
            exit();
        }

        $query = "INSERT INTO compra (idModelo, idUsuario, folio) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "iis", $modelo_id, $usuario_id, $folio);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: confirmacion.php");
            exit();
        } else {
            echo "<p class='alert alert-danger'>Error al guardar la compra: " . mysqli_error($con) . "</p>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);
    } else {
        // Si se intenta acceder a este archivo sin enviar el formulario
        header("Location: form.php");
        exit();
    }
?>
