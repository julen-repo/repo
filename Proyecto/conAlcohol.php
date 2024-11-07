<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Con Alcohol</title>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit();
    }

    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    
    $usuario = $_SESSION['usuario'];
    ?>
    <table>
        <tr>
            <th>Usuario: <?php echo htmlspecialchars($usuario); ?></th>
            <th><a href=<?php echo "principal.php?usuario=" . $usuario; ?>>Home</a></th>
            <th><a href="index.php">Ver carrito</a></th>
            <th><a href="?logout=true">Cerrar sesión</a></th>
        </tr>
    </table>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tienda";

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM bebidas WHERE tiene_alcohol = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>" . $row["nombre_producto"] . ": " . $row["precio"];
        }
    }
    ?>
</body>

</html>