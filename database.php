<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cursos";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Si se ha enviado el formulario para añadir una plaza
    if (isset($_POST['id_curso'])) {
        $id_curso = $_POST['id_curso'];

        // Actualizar las plazas ocupadas
        $update_sql = "UPDATE cursos SET plazas_ocupadas = plazas_ocupadas + 1 WHERE id_curso = $id_curso AND plazas_ocupadas < plazas_totales";
        if ($conn->query($update_sql) === TRUE) {
            echo "Plaza ocupada correctamente.<br>";
        } else {
            echo "Error al ocupar plaza: " . $conn->error . "<br>";
        }
    }

    $sql = "SELECT id_curso, curso, plazas_totales, plazas_ocupadas FROM cursos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id_curso"] . " Curso: " . $row["curso"] . " Plazas totales: " . $row["plazas_totales"] . " Plazas ocupadas: " . $row["plazas_ocupadas"] . "<br>";

            // Si no están todas las plazas ocupadas, mostrar el botón
            if ($row["plazas_ocupadas"] < $row["plazas_totales"]) {
                echo '
                    <form method="POST" action="">
                        <input type="hidden" name="id_curso" value="' . $row["id_curso"] . '">
                        <button type="submit">Ocupar una plaza</button>
                    </form>
                ';
            } else {
                // Si todas las plazas están ocupadas
                echo '<s>Curso lleno</s><br>';
            }
            echo "<hr>";
        }
    } else {
        echo "No se encontraron cursos.<br>";
    }

    $conn->close();
    ?>
</body>

</html>