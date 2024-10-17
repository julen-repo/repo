<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $pr = 30;
    function esPrimo($numero) {
        // Los números menores que 2 no son primos
        if ($numero < 2) {
            return false;
        }
    
        // Comprobamos si el número tiene divisores distintos de 1 y de sí mismo
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) {
                return false; // Si encontramos un divisor, no es primo
            }
        }
    
        return true; // Si no encontramos divisores, es primo
    }
    function primos($num)
    {
        $array1= array(); 
        for ($i = 1; $i < $num; $i++) {
            if(esPrimo($i)){
                array_push($array1,$i);
            }
        }
        foreach ($array1 as &$value) {
            echo $value;
        }
    }
    primos(30);
    ?>
</body>

</html>