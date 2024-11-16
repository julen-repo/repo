<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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


    // Enviar correo de confirmación
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_confirmation_email'])) {
        require 'C:\xampp\htdocs\repo\Proyecto\vendor\autoload.php';

        $mail = new PHPMailer(true);
        try {
            // Configuración SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dwesad001@gmail.com'; // Cambia a tu correo
            $mail->Password = 'fosj djcg qeeo pnpw';       // Cambia a tu contraseña o token de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('dwesad001@gmail.com', 'Carrito de Compras');
            $mail->addAddress($usuario); // Correo de destino
            $mail->Subject = 'Confirmación de compra';
            $mail->Body = "Hola $usuario, esta es una confirmación de que tu carrito ha sido procesado.";

            // Enviar correo
            $mail->send();
            echo "<div style='color: green;'>Correo de confirmación enviado correctamente.</div>";
            $_SESSION['carrito'] = [];
        } catch (Exception $e) {
            echo "<div style='color: red;'>Error al enviar el correo: {$mail->ErrorInfo}</div>";
        }
    }

    // Agregar el código del pago de PayPal
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
    // En lugar de enviar un correo al hacer clic en "Enviar confirmación",
    // mostramos un botón de pago de PayPal.
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

        // Botón de PayPal
        echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_blank'>
            <!-- Parámetros requeridos -->
            <input type='hidden' name='cmd' value='_xclick'>
            <input type='hidden' name='business' value='tu-correo-paypal@example.com'>
            <input type='hidden' name='item_name' value='Compra en Carrito'>
            <input type='hidden' name='amount' value='" . number_format($total, 2, '.', '') . "'>
            <input type='hidden' name='currency_code' value='USD'>
            <input type='hidden' name='return' value='http://localhost/repo/Proyecto/gracias.php'>
            <input type='hidden' name='cancel_return' value='http://localhost/repo/Proyecto/cancelado.php'>

            <!-- Botón de PayPal -->
            <button type='submit' class='enviar-pago-confirmacion'>Pagar con PayPal</button>
          </form>";
    }
    ?>
</body>

</html>