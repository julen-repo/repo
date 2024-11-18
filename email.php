<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label>Titulo</label><br>
    <textarea></textarea><br>
    <label>Texto</label><br>
    <textarea></textarea><br>
    <label>Texto alternativo</label><br>
    <textarea></textarea><br>
    <?php
    $mail = new PHPMailer(true);

    try {
        //Opcion sin SMTP
        $mail->isMail();

        // Configuración del servidor SMTP (Gmail)
        /*
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';        // Servidor SMTP de Gmail
        $mail->SMTPAuth = true;                 // Activar autenticación SMTP
        $mail->Username = 'tu_correo@gmail.com'; // Dirección de Gmail
        $mail->Password = 'tu_contraseña';       // Contraseña de Gmail o contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación TLS
        $mail->Port = 587;                      // Puerto para TLS
        */

        $mail->setFrom('julen.hernandez.omanas@iesjulianmarias.es', 'Julen_raro');  // Remitente
        $mail->addAddress('julenalonso6@gmail.com', 'Julen_oficial'); // Destinatario

        $mail->isHTML(true);
        $mail->Subject = 'Asunto del Email';
        $mail->Body    = '<h1>Hola</h1><p>Este es el cuerpo del mensaje en HTML</p>';
        $mail->AltBody = 'Este es el cuerpo del mensaje en texto plano para clientes de correo que no soportan HTML';

        if ($mail->send()) {
            echo "MENSAJE SE HA ENVIADO\n";
        } else {
            echo "ERROR AL ENVIAR MENSAJE";
        }

        echo 'El mensaje ha sido enviado correctamente';
    } catch (Exception $e) {
        echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
    }

    ?>

</body>

</html>