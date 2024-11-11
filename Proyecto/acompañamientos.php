<?php
// Incluir el archivo de funciones
include 'funciones.php';

session_start();

// Verificar si el usuario está logueado
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

// Verificar si se ha enviado el formulario para agregar al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    agregarAlCarrito($producto_id, $nombre, $precio, $cantidad);
}

// Obtener el ID de la categoría desde la URL
$categoria_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Definir la categoría para mostrar en el título
$categoria_nombre = '';
switch ($categoria_id) {
    case 1:
        $categoria_nombre = 'Entradas';
        break;
    case 2:
        $categoria_nombre = 'Paltos Principales';
        break;
    case 3:
        $categoria_nombre = 'Bebidas';
        break;
    case 4:
        $categoria_nombre = 'Postres';
        break;
    case 5:
        $categoria_nombre = 'Acompañamientos';
        break;
    default:
        $categoria_nombre = 'Productos';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categoria_nombre; ?> - Tienda</title>
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

        .productos-list {
            width: 100%;
            max-width: 800px;
            padding: 0;
        }

        .producto {
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .producto span {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }

        .producto .precio {
            color: #6B73FF;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .producto input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            margin-right: 10px;
        }

        .producto button {
            padding: 10px 15px;
            background-color: #6B73FF;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .producto button:hover {
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
    <table>
        <tr>
            <th>Usuario: <?php echo htmlspecialchars($usuario); ?></th>
            <th><a href="principal.php?usuario=<?php echo $usuario; ?>">Home</a></th>
            <th><a href="carrito.php">Ver carrito</a></th>
            <th><a href="?logout=true">Cerrar sesión</a></th>
        </tr>
    </table>

    <h1><?php echo $categoria_nombre; ?></h1>

    <div class="productos-list">
        <?php
        // Obtener los productos según la categoría seleccionada
        $productos = obtenerProductosPorCategoria($categoria_id);

        if (count($productos) > 0) {
            foreach ($productos as $row) {
                echo "<div class='producto'>
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
            echo "<div>No se encontraron productos en esta categoría.</div>";
        }
        ?>
    </div>
</body>

</html>