<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "geografia";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (isset($_POST['provincia'])) {
        $nom_provincia = $_POST['provincia'];

        // Consulta única para obtener la provincia y sus localidades
        $sql = "SELECT p.nombre AS provincia, p.n_provincia, l.nombre AS localidad, l.poblacion
            FROM provincias p
            LEFT JOIN localidades l ON p.n_provincia = l.n_provincia
            WHERE LOWER(p.nombre) = LOWER('" . $conn->real_escape_string($nom_provincia) . "')";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Provincia encontrada: " . $row['provincia'] . "<br>";

            // Reiniciar el puntero del resultado para obtener todas las filas
            $result->data_seek(0);

            $has_localidades = false; // Bandera para comprobar si hay localidades

            echo "<h2>Localidades:</h2>";
            echo "<ul>";

            // Iterar sobre todos los resultados
            do {
                if ($row['localidad']) { // Si hay localidad
                    echo "<li>Nombre: " . $row['localidad'] . " - Población: " . $row['poblacion'] . "</li>";
                    $has_localidades = true; // Cambiar la bandera si se encontró una localidad
                }
            } while ($row = $result->fetch_assoc());

            echo "</ul>";

            if (!$has_localidades) {
                echo "No se encontraron localidades para esta provincia.";
            }
        } else {
            echo "No se encontró la provincia.";
    ?>
            <form action="" method="post">
                <label for="provincia">Dime una provincia:</label><br>
                <input type="text" id="provincia" name="provincia" required><br><br>
                <input type="submit" value="Enviar">
            </form>
        <?php
        }
    } else {
        ?>
        <form action="" method="post">
            <label for="provincia">Dime una provincia:</label><br>
            <input type="text" id="provincia" name="provincia" required><br><br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>

</body>

</html>