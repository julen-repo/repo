<?php
// Función para conectar a la base de datos
function conectarBD()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tienda";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}

// Función para obtener productos de una categoría específica
function obtenerProductosPorCategoria($categoria_id)
{
    $conn = conectarBD();

    $sql = "SELECT * FROM productos WHERE categoria_id = ? ORDER BY nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoria_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $productos;
}

// Función para agregar productos al carrito
function agregarAlCarrito($producto_id, $nombre, $precio, $cantidad, $stock)
{
    if ($cantidad > 0) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $existe = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $producto_id) {
                // Verificar si la cantidad solicitada excede el stock disponible
                if ($item['cantidad'] + $cantidad > $item['stock']) {
                    // Almacenar mensaje de límite de stock alcanzado específico para este producto
                    $_SESSION['mensaje'][$producto_id] = "Has alcanzado el límite del stock para el producto: " . htmlspecialchars($item["nombre"]);
                    $existe = true;
                    break;
                } else {
                    // Agregar la cantidad solicitada al producto existente en el carrito
                    $item['cantidad'] += $cantidad;
                    $existe = true;
                    break;
                }
            }
        }

        // Si el producto no está en el carrito, agregarlo como un nuevo elemento
        if (!$existe) {
            if ($cantidad <= $stock) {
                $_SESSION['carrito'][] = [
                    'id' => $producto_id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                    'stock' => $stock
                ];
            } else {
                // Mensaje de error si la cantidad inicial solicitada excede el stock
                $_SESSION['mensaje'][$producto_id] = "Cantidad solicitada excede el stock disponible para el producto: " . htmlspecialchars($nombre);
            }
        }
    }
}
