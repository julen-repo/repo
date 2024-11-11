<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas con Alcohol</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        table {
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
            background-color: #6B73FF;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table tr th {
            padding: 15px;
            text-align: left;
            color: #fff;
        }

        table tr th a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        table tr th a:hover {
            background-color: #5A63E0;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #6B73FF;
        }

        .bebidas-list {
            width: 100%;
            max-width: 800px;
            padding: 0;
        }

        .bebida {
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bebida span {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }

        .bebida .precio {
            color: #6B73FF;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .bebida input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            margin-right: 10px;
        }

        .bebida button {
            padding: 10px 15px;
            background-color: #6B73FF;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .bebida button:hover {
            background-color: #5A63E0;
        }

        a {
            text-decoration: none;
            color: #6B73FF;
            font-weight: bold;
        }

        a:hover {
            color: #5A63E0;
        }
    </style>
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
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['producto_id'])) {
        $producto_id = $_POST['producto_id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        if ($cantidad > 0) {
            $existe = false;
            foreach ($_SESSION['carrito'] as &$item) {
                if ($item['id'] == $producto_id) {
                    $item['cantidad'] += $cantidad;
                    $existe = true;
                    break;
                }
            }
            if (!$existe) {
                $_SESSION['carrito'][] = [
                    'id' => $producto_id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                ];
            }
        }
    }
    ?>

    <table>
        <tr>
            <th>Usuario: <?php echo htmlspecialchars($usuario); ?></th>
            <th><a href=<?php echo "principal.php?usuario=" . $usuario; ?>>Home</a></th>
            <th><a href="carrito.php">Ver carrito</a></th>
            <th><a href="?logout=true">Cerrar sesión</a></th>
        </tr>
    </table>

    <h1>Bebidas con Alcohol</h1>

    <div class="bebidas-list">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tienda";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM bebidas WHERE tiene_alcohol = 1 ORDER BY nombre";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='bebida'>
                        <form method='POST' action=''>
                            <div style='flex: 1;'>
                                <span>" . htmlspecialchars($row["nombre"]) . "</span><br>
                                <span>Descripción: " . htmlspecialchars($row["descripcion"]) . "</span><br>
                                <span>Stock: " . htmlspecialchars($row["stock"]) . "</span><br>
                                <span class='precio'>$ " . number_format($row["precio"], 2) . "</span>
                            </div>
                            <input type='hidden' name='producto_id' value='" . $row["id"] . "'>
                            <input type='hidden' name='nombre' value='" . htmlspecialchars($row["nombre"]) . "'>
                            <input type='hidden' name='precio' value='" . $row["precio"] . "'>
                            <div style='display: flex; align-items: center;'>
                                <input type='number' name='cantidad' value='0' min='0' style='width: 60px; margin-right: 10px;' />
                                <button type='submit'>Agregar al carrito</button>
                            </div>
                        </form>
                    </div>";
            }
        } else {
            echo "<div>No se encontraron bebidas con alcohol.</div>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>