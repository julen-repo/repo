<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $numero1= rand(1,10);

    if($numero1<5){
        echo "Sacaste un $numero1: Insuficiente";
    }elseif($numero1==5){
        echo "Sacaste un $numero1: Suficiente";
    }elseif($numero1>5&&$numero1<7){
        echo "Sacaste un $numero1: Bien";
    }elseif($numero1>6&&$numero1<9){
        echo "Sacaste un $numero1: Notable";
    }else{
        echo "Sacaste un $numero1: Sobresaliente";
    }
    ?>
</body>

</html>