<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aproximación de π</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Aproximación de π</h1>
    <form method="POST">
        <label>Ingrese el valor de n:</label>
        <input type="number" name="n" min="1" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    $n = $_POST["n"];
    if ($n > 0) {
        $pi = 0;
        echo "<table border='1'>";
        echo "<tr><th>n</th><th>Aproximación de π</th></tr>";
        for ($i = 0; $i <= $n; $i++) {
            $pi += pow(-1, $i) / (2 * $i + 1);
            echo "<tr><td>$i</td><td>" . (4 * $pi) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Por favor, ingrese un valor mayor que 0.</p>";
    }
    ?>

    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
