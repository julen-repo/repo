<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario1</title>
</head>

<body>
    <h1>Formulario de Datos Personales</h1>
    <form action="ejercicioVisor3.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre Completo*:</label><br>
        <input type="text" id="nombre" name="nombre" ><br><br>

        <label for="fecha-nacimiento">Fecha de Nacimiento*:</label><br>
        <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" ><br><br>

        <label for="direccion">Dirección*:</label><br>
        <input type="text" id="direccion" name="direccion" ><br><br>

        <label for="ciudad">Ciudad*:</label><br>
        <input type="text" id="ciudad" name="ciudad" ><br><br>

        <label for="provincia">Provincia*:</label><br>
        <input type="text" id="provincia" name="provincia" ><br><br>

        <label for="codigo-postal">Código Postal*:</label><br>
        <input type="text" id="codigo-postal" name="codigo-postal" ><br><br>

        <label for="telefono">Número de Teléfono*:</label><br>
        <input type="tel" id="telefono" name="telefono" ><br><br>

        <label for="email">Correo Electrónico*:</label><br>
        <input type="email" id="email" name="email" ><br><br>

        <label for="ocupacion">Profesion*:</label><br>
        <input type="text" id="ocupacion" name="ocupacion" ><br><br>

        <label for="contrasena">Contraseña Sitio Web*:</label><br>
        <input type="password" id="contrasena" name="contrasena" ><br><br>

        <input type="submit" value="Enviar" name="submit">
    </form>

</body>

</html>