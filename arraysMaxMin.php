<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px" style="text-align: center; padding: 1px">
        <tr>
            <?php
            $numeros =  array();
            sort($numeros);
            for ($i = 0; $i < 10; $i++) {
                $numeros[$i] = rand(1, 30); ?>
                <td style="padding: 3px"> <?php echo $numeros[$i]; ?> </td><?php
                if (($i + 1) % 5 == 0) {?>
                    </tr> <?php
                    if ($i != 10) {?> 
                        <tr> <?php
                    }
                }
            }
            $datos= count($numeros);
            $aux=0;
            $auxMin=$numeros[1];
            $auxMax=0;

            for($i =0; $i<$datos;$i++){
                if($auxMax<$numeros[$i]){
                    $auxMax=$numeros[$i];
                }elseif($auxMin>$numeros[$i]){
                    $auxMin=$numeros[$i];
                }
            }
            $aux=$aux/count($numeros);
            ?><p><?php echo $aux ?> </p>
            <p>Valor minimo: <?php echo $auxMin ?> </p>
            <p>Valor maximo: <?php echo $auxMax ?> </p>
    </table>
</body>
