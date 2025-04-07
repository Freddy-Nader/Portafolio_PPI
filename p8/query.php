<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado compras</title>
    <link rel="stylesheet" href="style.css">
    <style> 
        /* Estilo para las tablas */
        table {
            border: 3px solid;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            border: 1px solid;
            padding: 5px;
            width: 120px;
        }

        table tr:nth-child(even) {
            background-color: white;
        }

        table tr:nth-child(odd) {
            background-color: lightblue;
        }

        th {
            background-color: sandybrown;
        }

        table th:hover, 
        table td:hover {
            background-color: black;
            color: white;
            cursor: crosshair;
        }
    </style>
</head>
<body>
    <?php
        $con = mysqli_connect("hostname", "root", "", "prueba");
        if (mysqli_connect_errno()) {
            echo "<p>La conexión con la base de datos SQL no fue exitosa: " . mysqli_connect_error() . "</p>";
        }
        $query = "SELECT compra.id AS id, modelo.nombre AS Modelo, usuarios.nombre AS Usuario, compra.folio AS Folio
                FROM compra
                JOIN modelo ON compra.idModelo = modelo.id
                JOIN usuarios ON compra.idUsuario = usuarios.id;";
        $result = mysqli_query($con, $query);
    ?>

    <table>
        <tr>
            <th>id</th>
            <th>Modelo</th>
            <th>Usuario</th>
            <th>Folio</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['Modelo'] . "</td><td>" . $row['Usuario'] . "</td><td>" . $row['Folio'] . "</td></tr>";
            }
        ?>
    </table>
</body>
</html>