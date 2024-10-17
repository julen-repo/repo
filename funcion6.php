<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptar / Desencriptar Texto</title>
</head>

<body>
    <h2>Formulario de Encriptación / Desencriptación</h2>
    <form action="funcion6Procesar.php" method="post">
        <label for="texto">Texto:</label><br>
        <input type="text" id="texto" name="texto" required><br><br>

        <label for="clave">Clave (entre 1 y 99):</label><br>
        <input type="number" id="clave" name="clave" min="1" max="99" required><br><br>

        <label for="accion">Elige una opción:</label><br>
        <input type="radio" id="encriptar" name="accion" value="encriptar" checked>
        <label for="encriptar">Encriptar</label><br>
        <input type="radio" id="desencriptar" name="accion" value="desencriptar">
        <label for="desencriptar">Desencriptar</label><br><br>

        <input type="submit" value="Procesar">
    </form>
</body>

</html>