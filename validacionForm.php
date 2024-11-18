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
    <?php
    $nombre = $telefono = $email = $ocupacion = $contrasena = '';
    $errores = [];

    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        $email = $_POST['email'] ?? '';
        $ocupacion = $_POST['ocupacion'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        if (empty($nombre)) {
            $errores['nombre'] = "El campo nombre es obligatorio.";
        }
        if (empty($telefono)) {
            $errores['telefono'] = "El campo teléfono es obligatorio.";
        }
        if (empty($email)) {
            $errores['email'] = "El campo email es obligatorio.";
        }
        if (empty($ocupacion)) {
            $errores['ocupacion'] = "El campo ocupación es obligatorio.";
        }
        if (empty($contrasena)) {
            $errores['contrasena'] = "El campo contraseña es obligatorio.";
        }

        if (empty($errores)) {
    ?>
            <table border="3px" align="center">
                <tr>
                    <td><?php echo htmlspecialchars($nombre); ?></td>
                    <td><?php echo htmlspecialchars($telefono); ?></td>
                    <td><?php echo htmlspecialchars($email); ?></td>
                    <td><?php echo htmlspecialchars($ocupacion); ?></td>
                    <td><?php echo htmlspecialchars($contrasena); ?></td>
                </tr>
            </table>
    <?php
        }
    }
    ?>
    <form action="validacionForm.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre Completo*:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br><br>
        <?php if (isset($errores['nombre'])) { ?>
            <p><?php echo $errores['nombre']; ?></p>
        <?php } ?>

        <label for="telefono">Número de Teléfono*:</label><br>
        <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>"><br><br>
        <?php if (isset($errores['telefono'])) { ?>
            <p><?php echo $errores['telefono']; ?></p>
        <?php } ?>

        <label for="email">Correo Electrónico*:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
        <?php if (isset($errores['email'])) { ?>
            <p><?php echo $errores['email']; ?></p>
        <?php } ?>

        <label for="ocupacion">Profesion*:</label><br>
        <input type="text" id="ocupacion" name="ocupacion" value="<?php echo htmlspecialchars($ocupacion); ?>"><br><br>
        <?php if (isset($errores['ocupacion'])) { ?>
            <p><?php echo $errores['ocupacion']; ?></p>
        <?php } ?>

        <label for="contrasena">Contraseña Sitio Web*:</label><br>
        <input type="password" id="contrasena" name="contrasena" value="<?php echo htmlspecialchars($contrasena); ?>"><br><br>
        <?php if (isset($errores['contrasena'])) { ?>
            <p><?php echo $errores['contrasena']; ?></p>
        <?php } ?>

        <input type="submit" value="Enviar" name="submit">
    </form>

</body>

</html>
