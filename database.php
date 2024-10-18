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

    $sql="SELECT id_curso,curso,plazas_totales,plazas_ocupadas FROM cursos";
    $result=$conn->query($sql);
    if($result){
        while($row = $result->fetch_assoc()){
            echo "ID: ".$row["id_curso"]." Curso: ".$row["curso"]." Plazas totales: ".$row["plazas_totales"]." Plazas ocupadas: ".$row["plazas_ocupadas"]."<br>";
        }
        $result->free();
    }

    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    } else {
        echo "Conexion establecida". "<br>";
    }
    echo $conn->host_info . "<br>";
    ?>
</body>

</html>