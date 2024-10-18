<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Multiplicar</title>
    <style>
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    function imprimir_tablas_multiplicar($inicio, $fin) {
        ?>
        <table>
            <tr>
                <th>Número</th>
                <?php
                for ($j = 1; $j <= 10; $j++) {
                    echo "<th>$j</th>";
                }
                ?>
            </tr>
            <?php
            for ($i = $inicio; $i <= $fin; $i++) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <?php
                    for ($j = 1; $j <= 10; $j++) {
                        ?>
                        <td><?php echo $i * $j; ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }

    $numero_inferior = 2; 
    $numero_superior = 400; 

    imprimir_tablas_multiplicar($numero_inferior, $numero_superior);
    ?>
</body>

</html>
