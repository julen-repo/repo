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
    <form action="ejercicioVisor1.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre Completo*:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="fecha-nacimiento">Fecha de Nacimiento*:</label><br>
        <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" required><br><br>

        <label for="direccion">Dirección*:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="ciudad">Ciudad*:</label><br>
        <input type="text" id="ciudad" name="ciudad" required><br><br>

        <label for="provincia">Provincia*:</label><br>
        <input type="text" id="provincia" name="provincia" required><br><br>

        <label for="codigo-postal">Código Postal*:</label><br>
        <input type="text" id="codigo-postal" name="codigo-postal" required><br><br>

        <label for="telefono">Número de Teléfono*:</label><br>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <label for="email">Correo Electrónico*:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="ocupacion">Profesion*:</label><br>
        <input type="text" id="ocupacion" name="ocupacion" required><br><br>

        <label for="contraseña">Contraseña Sitio Web*:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label>¿Cuál es tu situación laboral?</label><br>
        <input type="radio" id="empleado" name="situacion_laboral" value="empleado" checked>
        <label for="empleado">Empleado</label><br>

        <input type="radio" id="desempleado" name="situacion_laboral" value="desempleado">
        <label for="desempleado">Desempleado</label><br>

        <input type="radio" id="autonomo" name="situacion_laboral" value="autonomo">
        <label for="autonomo">Autónomo</label><br>

        <input type="radio" id="estudiante" name="situacion_laboral" value="estudiante">
        <label for="estudiante">Estudiante</label><br>

        <input type="radio" id="jubilado" name="situacion_laboral" value="jubilado">
        <label for="jubilado">Jubilado</label><br>

        <input type="radio" id="otro" name="situacion_laboral" value="otro">
        <label for="otro">Otro</label><br>
        <br>

        <label>Estudios: </label><br>
        <input type="checkbox" id="bach" name="bach" value="bach">
        <label for="bach">Bachillerato</label><br>

        <input type="checkbox" id="gradoM" name="gradoM" value="gradoM">
        <label for="gradoM">Grado Medio</label><br>

        <input type="checkbox" id="gradoS" name="gradoS" value="gradoS">
        <label for="gradoS">Grado Superior</label><br>

        <input type="checkbox" id="uni" name="uni" value="uni">
        <label for="uni">Carrera Universitaria</label><br>
        <br>

        <label>Archivo: </label><br>
        <input type="file" name="file"><br>
        <br>

        <label for="comentarios">Comentarios:</label><br>
        <textarea id="comentarios" name="comentarios" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>