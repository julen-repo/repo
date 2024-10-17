<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

</head>

<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ventasPasado = htmlspecialchars($_POST['ventasPasado']);
        $ventasAhora = htmlspecialchars($_POST['ventasAhora']);
        $desarrolloPasado = htmlspecialchars($_POST['desarrolloPasado']);
        $desarrolloAhora = htmlspecialchars($_POST['desarrolloAhora']);
        $operacionesPasado = htmlspecialchars($_POST['operacionesPasado']);
        $operacionesAhora = htmlspecialchars($_POST['operacionesAhora']);
        $calidadPasado = htmlspecialchars($_POST['calidadPasado']);
        $calidadAhora = htmlspecialchars($_POST['calidadAhora']);
        $atencionPasado = htmlspecialchars($_POST['atencionPasado']);
        $atencionAhora = htmlspecialchars($_POST['atencionAhora']);

        function calcularPorcentaje($nuevo, $pasado)
        {
            if ($pasado > 0) {
                return (($nuevo - $pasado)) * 100;
            } else {
                return $nuevo > 0 ? 100 : 0;
            }
        }
        $porcentajeVentas = calcularPorcentaje($ventasAhora,  $ventasPasado);
        $porcentajeDesarrollo = calcularPorcentaje($desarrolloAhora, $desarrolloPasado);
        $porcentajeOperaciones = calcularPorcentaje($operacionesAhora, $operacionesPasado);
        $porcentajeCalidad = calcularPorcentaje($calidadAhora, $calidadPasado);
        $porcentajeAtencion = calcularPorcentaje($atencionAhora, $atencionPasado);

        $sizeVentas = 16 + ($porcentajeVentas / 10);
        $sizeDesarrollo = 16 + ($porcentajeDesarrollo / 10);
        $sizeOperaciones = 16 + ($porcentajeOperaciones / 10);
        $sizeCalidad = 16 + ($porcentajeCalidad / 10);
        $sizeAtencion = 16 + ($porcentajeAtencion / 10);

        echo "<h1>Resumen de Datos</h1>";

        echo "<h2>VENTAS</h2>";
        echo "Ventas año pasado: $ventasPasado<br>";
        echo "Proyectos este año: $ventasAhora<br>";
        echo '<p class="ventas" style="background-color: green; color: white;" "width: '.$sizeVentas.'px">Porcentaje de aumento: ' . number_format($porcentajeDesarrollo, 2) . '%</p>';




        echo "<h2>DESARROLLO</h2>";
        echo "Proyectos año pasado: $desarrolloPasado<br>";
        echo "Proyectos este año: $desarrolloAhora<br>";
        echo '<p class="desarrollo" style="font-size: ' . $sizeDesarrollo . 'px;">Porcentaje de aumento: ' . number_format($porcentajeDesarrollo, 2) . '%</p>';

        echo "<h2>OPERACIONES</h2>";
        echo "Operaciones año pasado: $operacionesPasado<br>";
        echo "Operaciones este año: $operacionesAhora<br>";
        echo '<p class="operaciones" style="font-size: ' . $sizeOperaciones . 'px;">Porcentaje de aumento: ' . number_format($porcentajeOperaciones, 2) . '%</p>';

        echo "<h2>CALIDAD</h2>";
        echo "Calidad año pasado: $calidadPasado<br>";
        echo "Calidad este año: $calidadAhora<br>";
        echo '<p class="calidad" style="font-size: ' . $sizeCalidad . 'px;">Porcentaje de aumento: ' . number_format($porcentajeCalidad, 2) . '%</p>';

        echo "<h2>ATENCIÓN AL CLIENTE</h2>";
        echo "Atención al cliente año pasado: $atencionPasado<br>";
        echo "Atención al cliente este año: $atencionAhora<br>";
        echo '<p class="atencion" style="font-size: ' . $sizeAtencion . 'px;">Porcentaje de aumento: ' . number_format($porcentajeAtencion, 2) . '%</p>';
    } else {
        echo "No se recibieron datos.";
    }
    ?>
</body>

</html>