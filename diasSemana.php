<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $numero1 = rand(1, 7);
    switch ($numero1) {
        case 1:
            echo "Es lunes";
            break;
        case 2:
            echo "Es martes";
            break;
        case 3:
            echo "Es miercoles";
            break;
        case 4:
            echo "Es jueves";
            break;
        case 5:
            echo "Es viernes";
            break;
        case 6:
            echo "Es sabado";
            break;
        case 7:
            echo "Es domingo";
    }
    ?>
</body>

</html>