<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="0.1px solid black" style="text-align: center; width:80%;">
        <tr style="background-color:ghostwhite;"> <?php $paises = array("Estados Unidos" => array(39, 41, 33), "China" => array(38, 32, 18), "Rusia" => array(20, 28, 23),                                "Japon" => array(27, 14, 17), "Australia" => array(17, 7, 22));                ?> <td>Pais</td>
            <td>Oro</td>
            <td>Plata</td>
            <td>Bronce</td>
        </tr> <?php foreach ($paises as $clave => $valor) { ?> <tr>
                <td><?php echo $clave; ?></td> 
                <?php for ($i = 0; $i < count($valor); $i++) {
                            switch ($i) {
                                case 0: ?> <td style="background-color:yellow; padding: 3px;"> <?php break;
                                case 1: ?><td style="background-color:darkgray; padding: 3px;"> <?php break;
                                case 2: ?><td style="background-color:coral; padding: 3px;"> <?php break;
                            }
                echo $valor[$i]; ?> </td> <?php                        
                } ?>
            </tr> <?php } ?>
    </table>
</body>

</html>