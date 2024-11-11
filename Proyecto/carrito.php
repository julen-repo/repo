<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>

<body>
    <h1>Carrito de Compras</h1>

    <?php
    session_start();

    // Verificar si el carrito tiene productos
    if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
        echo "<p>El carrito está vacío.</p>";
    } else {
        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>";

        $total = 0;

        // Mostrar cada producto en el carrito
        foreach ($_SESSION['carrito'] as $item) {
            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;

            echo "<tr>
                    <td>" . htmlspecialchars($item['nombre']) . "</td>
                    <td>$ " . number_format($item['precio'], 2) . "</td>
                    <td>" . $item['cantidad'] . "</td>
                    <td>$ " . number_format($subtotal, 2) . "</td>
                  </tr>";
        }

        echo "<tr>
                <td colspan='3'><strong>Total</strong></td>
                <td><strong>$ " . number_format($total, 2) . "</strong></td>
              </tr>
              </table>";
    }
    ?>

    <p><a href="principal.php">Continuar comprando</a></p>
</body>

</html>