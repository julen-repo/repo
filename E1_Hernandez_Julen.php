<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el Número</title>
    <link rel="stylesheet" href="estilosEjercicio.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['secreto'])) {
        $_SESSION['secreto'] = rand(1, 100);
    }

    $mensaje = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = htmlspecialchars($_POST['numero']);
        $secreto = $_SESSION['secreto'];

        if ($numero == $secreto) {
            $mensaje = "¡Correcto! El número era $secreto. Intenta adivinarlo de nuevo";
            session_destroy();
        } else {
            $mensaje = "Incorrecto. Intenta de nuevo.";
        }
    }
    ?>

    <form action="" method="post">
        <label for="numero">Adivina el número (entre 1 y 100):</label><br>
        <input type="number" id="numero" name="numero" min="1" max="100" required><br><br>
        <input type="hidden" name="secreto" value="<?php echo $_SESSION['secreto']; ?>">
        <input type="submit" value="Enviar">
    </form>

    <p><?php echo $mensaje; ?></p>
    <p style="display:none;">Número secreto para pruebas: <?php echo $_SESSION['secreto']; ?></p>
</body>

</html>
