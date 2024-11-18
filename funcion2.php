<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $numeros = array(10,0);
    function calcular_media($array)
    {
        $total = 0;
        foreach ($array as &$value) {
            $total = $total + $value;
        }
        echo $total/count($array);
    }
    calcular_media($numeros);
    ?>
</body>

</html>