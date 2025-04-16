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
    <title>Nueva compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../js/navbar.js"></script>
</head>

<body>
    <nav-bar></nav-bar>

    <div class="container mt-5">
        <h2>Nueva compra</h2>
        <nav aria-label="Navegación">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="lista.php">Ver compras</a></li>
            </ul>
        </nav>
        <form action="proceso.php" method="POST">
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <select class="form-control" id="modelo" name="modelo_id" required>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "autos");
                    if (mysqli_connect_errno()) {
                        echo "<p class='alert alert-danger'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
                        exit();
                    }
                    $query = "SELECT id, nombre FROM modelo";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                        mysqli_free_result($result);
                    } else {
                        echo "<p class='alert alert-danger'>Error al ejecutar la consulta de modelos: " . mysqli_error($connection) . "</p>";
                    }
                    mysqli_close($connection);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <select class="form-control" id="usuario" name="usuario_id" required>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "autos");
                    if (mysqli_connect_errno()) {
                        echo "<p class='alert alert-danger'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
                        exit();
                    }
                    $query = "SELECT id, nombre FROM usuarios";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                        mysqli_free_result($result);
                    } else {
                        echo "<p class='alert alert-danger'>Error al ejecutar la consulta de usuarios: " . mysqli_error($connection) . "</p>";
                    }
                    mysqli_close($connection);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="folio">Folio:</label>
                <input type="text" class="form-control" id="folio" name="folio" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar compra</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>