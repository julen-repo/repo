<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>Resultado de la División</h1>";
    if (isset($_GET['dividendo'])&&isset($_GET['divisor'])) {
        $dividendo = htmlspecialchars($_GET['dividendo']);
        $divisor = htmlspecialchars($_GET['divisor']);$dividendo / $divisor;
        if(($dividendo % $divisor)==0){
            echo "Es exacta<br>";
            echo "Resto: ".$dividendo % $divisor."<br>";
            echo "Cociente: ".round($dividendo / $divisor)."<br>";
        }else{
            echo "No es exacta";
            echo "Resto: ".$dividendo % $divisor."<br>";
            echo "Cociente: ".round($dividendo / $divisor)."<br>";
        }
    } else {
        echo "No se recibió ningún resultado.";
    }
    ?>
</body>

</html>