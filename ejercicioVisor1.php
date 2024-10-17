<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosVisor.css">
    <title>Visor</title>
</head>

<body>
    <table>
        <tr>
            <th>Nombre Completo</th>
            <th>Fecha de Nacimiento</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Código Postal</th>
            <th>Número de Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Profesión</th>
            <th>Situacion Laboral</th>
        </tr>
        <tr>
            <td id="nombre"><?php echo $_POST['nombre']; ?></td>
            <td id="fecha"><?php echo $_POST['fecha-nacimiento']; ?></td>
            <td id="direccion"><?php echo $_POST['direccion']; ?></td>
            <td id="ciudad"><?php echo $_POST['ciudad']; ?></td>
            <td id="provincia"><?php echo $_POST['provincia']; ?></td>
            <td id="codigo"><?php echo $_POST['codigo-postal']; ?></td>
            <td id="telefono"><?php echo $_POST['telefono']; ?></td>
            <td id="correo"><?php echo $_POST['email']; ?></td>
            <td id="profesion"><?php echo $_POST['ocupacion']; ?></td>
            <td id="profesion"><?php echo $_POST['situacion_laboral']; ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <th>Estudios</th>
        </tr>
        <tr>
            <td id="nombre"><?php echo $_POST['comentarios']; ?></td>
        </tr>
    </table>
    <p><?php
        if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
            $nombreTemporal = $_FILES['file']['tmp_name'];
            echo $nombreTemporal;
            if (is_file($nombreTemporal)) {
                $directorioDestino = "./";
                $nombreArchivo = time() . "-" . $_FILES['file']['name'];
                $rutaCompleta = $directorioDestino . $nombreArchivo;
                if(move_uploaded_file($nombreTemporal,$rutaCompleta)){
                    echo "Subido y movido";
                }else{
                    echo "No se pudo subir";
                }
            }else{
                echo "Error en el archivo";
            }
        } else {
            echo "Error no se pudo recibir un archivo valido";
        }
        ?></p>
</body>

</html>