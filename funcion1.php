<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function mul($num)
    {
        for ($i = 1; $i < 11; $i++) {
            $resul = $num * $i;
            echo $resul . "<br></br>";
        }
    }
    mul(5);
    ?>
</body>

</html>