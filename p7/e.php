<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aproximación de e</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/p7/style.css">
    <script src="../js/navbar.js"></script>
</head>

<body>
    <nav-bar></nav-bar>

    <h1>Aproximación de e</h1>
    <form method="POST">
        <label>Ingrese el valor de n:</label>
        <input type="number" name="n" min="1" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    function factorial($num)
    {
        $fact = 1;
        for ($i = 1; $i <= $num; $i++) {
            $fact *= $i;
        }
        return $fact;
    }

    $n = $_POST["n"];
    if ($n > 0) {
        $e = 0;
        echo "<table border='1'>";
        echo "<tr><th>n</th><th>Aproximación de e</th></tr>";
        for ($i = 0; $i <= $n; $i++) {
            $e += 1 / factorial($i);
            echo "<tr><td>$i</td><td>$e</td></tr>";
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