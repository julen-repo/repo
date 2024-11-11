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
function agregarAlCarrito($producto_id, $nombre, $precio, $cantidad)
{
    if ($cantidad > 0) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

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