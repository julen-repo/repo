<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de sesión</title>
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
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FFD36E, #FF6B73);
            color: #333;
        }

        /* Form container */
        .form-container {
            background-color: #f9f9f9;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 1.5rem;
            color: #333;
            font-weight: bold;
        }

        .form-container label {
            display: block;
            margin-top: 1rem;
            font-size: 1rem;
            color: #555;
            text-align: left;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.25rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            border-color: #FF6B73;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            margin-top: 1.5rem;
            background-color: #FF6B73;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #FF5A63;
        }

        /* Error message styling */
        .error-message {
            margin-top: 1rem;
            padding: 0.75rem;
            background-color: #FFE6E6;
            color: #AA0000;
            border: 1px solid #FF9999;
            border-radius: 6px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Registro de sesión</h2>
        <form action="registro.php" method="post">
            <label for="usuario">Email</label>
            <input type="email" id="usuario" name="usuario" required placeholder="correo@example.com">

            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="pass" required placeholder="Contraseña">

            <input type="submit" value="Enviar">
        </form>

        <?php
        session_start();

        // Si el usuario ya está logueado, redirigirlo a la página principal sin pasar por el registro
        if (isset($_SESSION['usuario'])) {
            header("Location: principal.php?usuario=" . $_SESSION['usuario']);
            exit();
        }

        // Procesamiento del formulario de registro
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "tienda";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Validación de entrada del formulario
            if (isset($_POST['usuario']) && isset($_POST['pass'])) {
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];

                // Comprobar si el usuario ya existe
                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $result = $stmt->get_result();

                // Si el usuario existe, mostrar mensaje y detener ejecución
                if ($result->num_rows > 0) {
                    echo '<div class="error-message">Ya existe ese usuario. Por favor, inicia sesión o usa otro nombre.</div>';
                    $stmt->close();
                    $conn->close();
                    return; // Detener flujo aquí
                }

                // Si el usuario no existe, proceder a la creación
                $sql_insert = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
                $stmt_insert = $conn->prepare($sql_insert);
                $stmt_insert->bind_param("ss", $usuario, $pass);

                if ($stmt_insert->execute()) {
                    echo "Nuevo usuario creado exitosamente.";
                    $_SESSION['usuario'] = $usuario; // Guardar usuario en la sesión
                    header("Location: principal.php?usuario=" . $usuario); // Redirigir a la página principal
                    exit();
                } else {
                    echo '<div class="error-message">Error al crear el usuario: ' . $stmt_insert->error . '</div>';
                }

                // Cerrar la conexión de inserción
                $stmt_insert->close();
            }

            // Cerrar la conexión de selección
            $stmt->close();
            // Cerrar la conexión a la base de datos
            $conn->close();
        }
        ?>

    </div>
</body>

</html>