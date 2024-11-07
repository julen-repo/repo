<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <style>
        /* Basic reset for margins, padding, and box-sizing */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Centering container */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6B73FF, #000DFF);
            color: #333;
        }

        /* Form container */
        .form-container {
            background-color: #fff;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 1rem;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-top: 1rem;
            font-size: 1rem;
            color: #666;
            text-align: left;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.25rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            margin-top: 1rem;
            background-color: #6B73FF;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #5A63E0;
        }

        /* Error message styling */
        .error-message {
            margin-top: 1rem;
            padding: 0.75rem;
            background-color: #FFCCCC;
            color: #990000;
            border: 1px solid #CC0000;
            border-radius: 4px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Inicio de Sesión</h2>
        <form action="index.php" method="post">
            <label for="usuario">Email</label>
            <input type="email" id="usuario" name="usuario" required placeholder="correo@example.com">

            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="pass" required placeholder="Contraseña">

            <input type="submit" value="Enviar">
        </form>

        <?php
        session_start();

        // Borrar el caché para que no guarde la contraseña en el navegador
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        // Si el usuario ya está logueado, redirigirlo a la página principal(necesario cerrar sesion para volver al login)
        if (isset($_SESSION['usuario'])) {
            header("Location: principal.php?usuario=" . $_SESSION['usuario']);
            exit();
        }

        // Si se manda el formulario hacer esto
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conexion a la base de datos
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

                // Verificar si el usuario existe
                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $result = $stmt->get_result();

                // Si hay resultados
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Verificar la contraseña
                    if ($row["contrasena"] == $pass) {
                        // Guardar el usuario en la sesión
                        $_SESSION['usuario'] = $usuario;
                        // Redirigir al usuario a la página principal
                        header("Location: principal.php?usuario=" . $usuario);
                        exit();
                    } else {
                        echo '<div class="error-message">La contraseña no es válida.</div>';
                    }
                }
                // Si no hay resultados
                else {
                    $sql_insert = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->bind_param("ss", $usuario, $pass);
                    if ($stmt_insert->execute()) {
                        echo "Nuevo usuario creado exitosamente.";
                        $_SESSION['usuario'] = $usuario;
                        header("Location: principal.php?usuario=" . $usuario);
                        exit();
                    } else {
                        echo '<div class="error-message">Error al crear el usuario: ' . $stmt_insert->error . '</div>';
                    }
                    //Cierre de la conexion del insert
                    $stmt_insert->close();
                }

                // Cerrar la conexión del select
                $stmt->close();
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
        }
        ?>
    </div>
</body>

</html>