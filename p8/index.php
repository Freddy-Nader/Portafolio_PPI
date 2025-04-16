<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado compras</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/p8/style.css">
    <script src="../js/navbar.js"></script>
</head>

<body>
    <nav-bar></nav-bar>

    <main>
        <h1>Listado de Compras</h1>
        <?php
        $con = mysqli_connect("localhost", "root", "", "autos");
        if (mysqli_connect_errno()) {
            echo "<p class='error'>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
        } else {
            $query = "SELECT compra.id AS id, modelo.nombre AS Modelo, 
                            usuarios.nombre AS Usuario, compra.folio AS Folio
                        FROM compra
                        JOIN modelo ON compra.idModelo = modelo.id
                        JOIN usuarios ON compra.idUsuario = usuarios.id;";

            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Usuario</th>
                                <th>Folio</th>
                            </tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                                <td>" . htmlspecialchars($row['id']) . "</td>
                                <td>" . htmlspecialchars($row['Modelo']) . "</td>
                                <td>" . htmlspecialchars($row['Usuario']) . "</td>
                                <td>" . htmlspecialchars($row['Folio']) . "</td>
                            </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No se encontraron registros.</p>";
            }

            mysqli_close($con);
        }
        ?>
        <br>
    </main>
</body>

</html>
