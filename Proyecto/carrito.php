<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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

        /* Cart Table Styling */
        .cart-table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #6B73FF;
            color: #fff;
            font-weight: bold;
        }

        .cart-table td {
            color: #333;
        }

        .cart-table tr:last-child td {
            border-bottom: none;
        }

        /* Total Styling */
        .total-row td {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }

        .total-row td:last-child {
            color: #6B73FF;
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

        /* Empty Cart Message */
        .empty-cart {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 1.1rem;
            color: #333;
        }

        /* Clear Cart Button */
        .clear-cart-button {
            padding: 10px 20px;
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .clear-cart-button:hover {
            background-color: #e65a5a;
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
            <th><a href="carrito.php">Ver carrito</a></th>
            <th><a href="?logout=true">Cerrar sesión</a></th>
        </tr>
    </table>

    <h1>Carrito de Compras</h1>

    <?php
    // Limpiar el carrito si el botón de borrar es presionado
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear_cart'])) {
        $_SESSION['carrito'] = [];
    }

    if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
        echo "<div class='empty-cart'>El carrito está vacío.</div>";
    } else {
        echo "<form method='POST'>";
        echo "<table class='cart-table'>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>";

        $total = 0;

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

        echo "<tr class='total-row'>
                <td colspan='3'>Total</td>
                <td>$ " . number_format($total, 2) . "</td>
              </tr>
              </table>
              <button type='submit' name='clear_cart' class='clear-cart-button'>Borrar carrito</button>";
        echo "</form>";
    }
    ?>

    <p><a href="principal.php">Continuar comprando</a></p>
</body>

</html>