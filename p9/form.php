<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Nueva Compra</h2>
        <nav aria-label="Navegación">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="lista.php">Ver Compras</a></li>
            </ul>
        </nav>
        <form action="proceso.php" method="POST">
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <select class="form-control" id="modelo" name="modelo_id" required>
                    <?php
                        $con = mysqli_connect("hostname", "root", "", "autos");
                        if (mysqli_connect_errno()) {
                            echo "<p class='alert alert-danger'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
                            exit();
                        }
                        $query_modelos = "SELECT id, nombre FROM modelo";
                        $result_modelos = mysqli_query($con, $query_modelos);
                        while ($row_modelo = mysqli_fetch_array($result_modelos)) {
                            echo "<option value='" . $row_modelo['id'] . "'>" . $row_modelo['nombre'] . "</option>";
                        }
                        mysqli_close($con);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <select class="form-control" id="usuario" name="usuario_id" required>
                    <?php
                        $con = mysqli_connect("hostname", "root", "", "autos");
                        if (mysqli_connect_errno()) {
                            echo "<p class='alert alert-danger'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
                            exit();
                        }
                        $query_usuarios = "SELECT id, nombre FROM usuarios";
                        $result_usuarios = mysqli_query($con, $query_usuarios);
                        while ($row_usuario = mysqli_fetch_array($result_usuarios)) {
                            echo "<option value='" . $row_usuario['id'] . "'>" . $row_usuario['nombre'] . "</option>";
                        }
                        mysqli_close($con);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="folio">Folio:</label>
                <input type="text" class="form-control" id="folio" name="folio" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Compra</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
