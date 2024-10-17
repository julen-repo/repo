<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $numero1 = rand(1, 10);
    switch ($numero1) {
        case 1:
            echo "Sacaste un $numero1: Insuficiente";
            break;
        case 2:
            echo "Sacaste un $numero1: Insuficiente";
            break;
        case 3:
            echo "Sacaste un $numero1: Insuficiente";
            break;
        case 4:
            echo "Sacaste un $numero1: Insuficiente";
            break;
        case 5:
            echo "Sacaste un $numero1: Suficiente";
            break;
        case 6:
            echo "Sacaste un $numero1: Bien";
            break;
        case 7:
            echo "Sacaste un $numero1: Notable";
            break;
        case 8:
            echo "Sacaste un $numero1: Notable";
            break;
        case 9:
            echo "Sacaste un $numero1: Sobresaliente";
            break;
        case 10:
            echo "Sacaste un $numero1: Sobresaliente";
    }
    ?>
</body>

</html>