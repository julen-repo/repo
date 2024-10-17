<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dividendo = $_POST['dividendo'] ?? '';
        $divisor = $_POST['divisor'] ?? '';
        $errores = [];

        if (empty($dividendo)) {
            $errores[] = "El dividendo es requerido.";
        }
        if (!is_numeric($dividendo) || $dividendo < 0 || $dividendo >= 1000) {
            $errores[] = "El dividendo debe ser un número decimal menor a 1000.";
        }

        if (empty($divisor)) {
            $errores[] = "El divisor es requerido.";
        }
        if (!is_numeric($divisor) || $divisor <= 0 || $divisor >= 1000) {
            $errores[] = "El divisor debe ser un número decimal mayor a 0 y menor a 1000.";
        }
        if (empty($errores)) {
            $resultado = $dividendo / $divisor;
            header("Location: calculadoraVisor.php?dividendo=" . urlencode($dividendo) . "&divisor=" . urlencode($divisor));
            exit();
        } else {
            foreach ($errores as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        }
    }
    ?>

    <form action="calculadora.php" method="post">
        <label for="dividendo">Dividendo:</label><br>
        <input type="number" id="dividendo" name="dividendo" step="0.01" max="999.99" min="0" required><br><br>

        <label for="divisor">Divisor:</label><br>
        <input type="number" id="divisor" name="divisor" step="0.01" max="999.99" min="0" required><br><br>

        <input type="submit" value="Enviar" name="submit">
    </form>
</body>

</html>