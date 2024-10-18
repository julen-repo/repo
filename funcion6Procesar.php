<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $texto = $_POST['texto'];
        $clave = intval($_POST['clave']);
        $accion = $_POST['accion'];

        if (strlen($texto) <= 10) {
            echo "Error: El texto debe tener más de 10 caracteres.";
            exit();
        }

        if ($clave < 1 || $clave > 99) {
            echo "Error: La clave debe ser un número entre 1 y 99.";
            exit();
        }

        // Encriptar y desencriptar
        function procesar_texto($texto, $clave, $accion)
        {
            $resultado = "";
            for ($i = 0; $i < strlen($texto); $i++) {
                $char = $texto[$i];
                $codigo_ascii = ord($char);

                if ($accion == 'encriptar') {
                    $nuevo_codigo = $codigo_ascii + $clave;
                } else {
                    $nuevo_codigo = $codigo_ascii - $clave;
                }

                $nuevo_char = chr($nuevo_codigo);
                $resultado .= $nuevo_char;
            }
            return $resultado;
        }

        if ($accion == 'encriptar') {
            $texto_procesado = procesar_texto($texto, $clave, 'encriptar');
            echo "<h2>Texto Encriptado:</h2>";
            echo "<p>$texto_procesado</p>";
        } else {
            $texto_procesado = procesar_texto($texto, $clave, 'desencriptar');
            echo "<h2>Texto Desencriptado:</h2>";
            echo "<p>$texto_procesado</p>";
        }
    }
    ?>