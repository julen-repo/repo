<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        /* Reset del ccs general */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Estilo del body */
        body {
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Estilo de la tabla */
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

        /* Estilo cabecera */
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #6B73FF;
        }

        /* Estilo de la carta */
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

        /* Estilo del total */
        .total-row td {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }

        .total-row td:last-child {
            color: #6B73FF;
        }

        /* Estilos de los links */
        a {
            text-decoration: none;
            color: #6B73FF;
            font-weight: bold;
        }

        a:hover {
            color: #5A63E0;
        }

        /* Mensaje de vacio */
        .empty-cart {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 1.1rem;
            color: #333;
        }

        /* Boton enviar */
        .enviar-pago-confirmacion {
            padding: 10px 20px;
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .enviar-pago-confirmacion:hover {
            background-color: #e65a5a;
        }


        .delete-button {
            padding: 8px 12px;
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .delete-button:hover {
            background-color: #e65a5a;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Asegurarse de que el usuario ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit();
    }

    // Procesar el cierre de sesión
    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    $usuario = $_SESSION['usuario'];

    require 'paypal_config.php'; // Configuración de PayPal

    // Eliminar un producto individualmente
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product_id'])) {
        $delete_id = $_POST['delete_product_id'];
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['id'] == $delete_id) {
                unset($_SESSION['carrito'][$key]);
                break;
            }
        }
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
    }

    // Procesar el pago con PayPal
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_confirmation_email'])) {
        $client = PayPalClient::client();

        $items = [];
        $total = 0;

        foreach ($_SESSION['carrito'] as $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;

            $items[] = [
                'name' => $producto['nombre'],
                'unit_amount' => [
                    'currency_code' => 'USD',
                    'value' => $producto['precio']
                ],
                'quantity' => $producto['cantidad']
            ];
        }

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => number_format($total, 2, '.', ''),
                    'breakdown' => [
                        'item_total' => [
                            'currency_code' => 'USD',
                            'value' => number_format($total, 2, '.', '')
                        ]
                    ]
                ],
                'items' => $items
            ]],
            'application_context' => [
                'return_url' => 'http://localhost/tu-proyecto/gracias.php',
                'cancel_url' => 'http://localhost/tu-proyecto/cancelado.php'
            ]
        ];

        try {
            $response = $client->execute($request);

            // Obtener la URL de aprobación del pago
            foreach ($response->result->links as $link) {
                if ($link->rel === 'approve') {
                    header("Location: " . $link->href);
                    exit();
                }
            }
        } catch (Exception $e) {
            echo "<div style='color: red;'>Error al procesar el pago: {$e->getMessage()}</div>";
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

    <h1>Carrito de Compras</h1>

    <?php
    if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
        echo "<div class='empty-cart'>El carrito está vacío.</div>";
    } else {
        echo "<form method='POST'>"; // Form principal para la tabla.
        echo "<table class='cart-table'>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
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
                <td>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='delete_product_id' value='" . $item['id'] . "'>
                        <button type='submit' class='delete-button'>Eliminar</button>
                    </form>
                </td>
              </tr>";
        }

        echo "<tr class='total-row'>
            <td colspan='3'>Total</td>
            <td>$ " . number_format($total, 2) . "</td>
            <td></td>
          </tr>
          </table>
          </form>";

        echo "<form method='POST'>
            <button type='submit' name='send_confirmation_email' class='enviar-pago-confirmacion'>Proceder al pago con PayPal</button>
          </form>";
    }
    ?>
</body>

</html>