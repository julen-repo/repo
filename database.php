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
    $database = "cursos";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    } else {
        echo "Conexion establecida". "<br>";
    }
    echo $conn->host_info . "<br>";
    ?>
</body>

</html>