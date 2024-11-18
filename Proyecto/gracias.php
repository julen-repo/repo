<?php
require 'paypal_config.php';

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

if (isset($_GET['token'])) {
    $client = PayPalClient::client();
    $orderId = $_GET['token']; // ID del pedido

    $request = new OrdersCaptureRequest($orderId);
    $request->prefer('return=representation');

    try {
        $response = $client->execute($request);
        // Procesar la respuesta (actualizar la base de datos, vaciar carrito, etc.)
        echo "<div style='color: green;'>Pago completado con éxito. Gracias por tu compra.</div>";
        $_SESSION['carrito'] = []; // Vaciar el carrito
    } catch (Exception $e) {
        echo "<div style='color: red;'>Error al capturar el pago: {$e->getMessage()}</div>";
    }
} else {
    echo "<div style='color: red;'>No se recibió el token de PayPal.</div>";
}
