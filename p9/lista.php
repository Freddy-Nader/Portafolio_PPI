<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Compras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Opcional: Puedes agregar estilos personalizados aquí si lo necesitas */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Listado de Compras</h2>
        <nav aria-label="Navegación">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="form.php">Nueva Compra</a></li>
            </ul>
        </nav>
        <?php
            $con = mysqli_connect("localhost", "root", "", "autos");
            if (mysqli_connect_errno()) {
                echo "<p class='alert alert-danger'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
                exit();
            }
            $query = "SELECT compra.id AS id, modelo.nombre AS Modelo, usuarios.nombre AS Usuario, compra.folio AS Folio
                      FROM compra
                      JOIN modelo ON compra.idModelo = modelo.id
                      JOIN usuarios ON compra.idUsuario = usuarios.id;";
            $result = mysqli_query($con, $query);
        ?>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Usuario</th>
                    <th>Folio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['Modelo'] . "</td><td>" . $row['Usuario'] . "</td><td>" . $row['Folio'] . "</td></tr>";
                    }
                ?>
            </tbody>
        </table>

        <?php
            mysqli_close($con);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
