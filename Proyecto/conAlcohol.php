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

        /* Body Styling */
        body {
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Table Styling */
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

        /* Heading Styling */
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #6B73FF;
        }

        /* Bebidas List Styling */
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

        /* Input Number Styling */
        .bebida input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            margin-right: 10px;
            /* Space between input and button */
        }

        /* Button Styling */
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

        /* Link Styling */
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
    ?>
    <table>
        <tr>
            <th>Usuario: <?php echo htmlspecialchars($usuario); ?></th>
            <th><a href=<?php echo "principal.php?usuario=" . $usuario; ?>>Home</a></th>
            <th><a href="index.php">Ver carrito</a></th>
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

        $sql = "SELECT * FROM bebidas WHERE tiene_alcohol = 1 ORDER BY nombre";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='bebida'>
                        <div style='flex: 1;'>
                            <span>" . htmlspecialchars($row["nombre"]) . "</span>
                            <span class='precio'>$ " . number_format($row["precio"], 2) . "</span>
                        </div>
                        <div style='display: flex; align-items: center;'>
                            <input type='number' value='0' min='0' id='cantidad_" . $row["id"] . "' />
                            <button onclick='comprar(" . $row["id"] . ",".$row["nombre"].",".$row["precio"].")'>Comprar</button>
                        </div>
                    </div>";
            }
        } else {
            echo "<div>No se encontraron bebidas con alcohol.</div>";
        }
        ?>
    </div>

    <script>
        function comprar(id,nombre,precio) {
            var cantidad = document.getElementById('cantidad_' + id).value;
            if (cantidad > 0) {
                alert('Comprando ' + cantidad + ' unidades del producto ID: ' + nombre);
                // Aquí podrías agregar código para procesar la compra (enviar a un carrito, etc.)
            } else {
                alert('Por favor, selecciona una cantidad mayor a 0.');
            }
        }
    </script>
</body>

</html>