<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>

<body>
    <form action="index.php" method="post">
        <label>Email<input type="email" name="usuario" require></label>
        <label>Contraseña<input type="password" name="pass" require></label>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tienda";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Si se ha enviado el formulario
        if (isset($_POST['usuario']) && isset($_POST['pass'])) {
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            $sql = "SELECT * FROM usuarios WHERE nombre_usuario = " . $usuario;
            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "El usuario ya existe.";
            } else {
                $sql_insert = "INSERT INTO usuarios (nombre_usuario, contrasena_hash) VALUES (" . $usuario . ", " . $pass . ")";
                $stmt_insert = $conn->prepare($sql_insert);
                echo "Usuario insertado.";
            }

            if ($stmt_insert->execute()) {
                echo "Nuevo usuario creado exitosamente.";
            } else {
                echo "Error al crear el usuario: " . $stmt_insert->error;
            }

            $stmt_insert->close();
            $stmt->close();
            $conn->close();
        }
    }
    ?>
</body>

</html>