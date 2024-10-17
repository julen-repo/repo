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
    $numero2= rand(1,10);

    if($numero1>$numero2){
        echo "$numero1 es mayor que $numero2";
    }elseif($numero1==$numero2){
        echo "$numero1 y $numero2 son iguales";
    }else{
        echo "$numero2 es mayor que $numero1";
    }
    ?>
</body>

</html>