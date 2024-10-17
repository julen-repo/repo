<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body> <?php $ciudades = array("Avila" => "37", "Burgos" => "13", "Leon" => "16", "Palencia" => "-2", "Salamanca" => "11", "Segovia" => "38", "Soria" => "28", "Valladolid" => "30", "Zamora" => "-7");
        echo '<table cellspacing="0" cellpadding="0">';
        ?><tr">
            <th style="background-color:blue;">Provincia</th>
            <th style="background-color:blue;">Temperatura(ºC)</th>
            
        </tr>
        <?php
        foreach ($ciudades as $nombre => $valor) {
            echo "<tr>";
            echo "<th>$nombre</th>";
            if ($valor < 30 && $valor > 9) {
                echo "<th>$valor</th>";
            }elseif($valor<=9){
                ?><th style="background-color:blue;"><?php echo $valor?></th>
                <?php
            }else{
                ?><th style="background-color:orange;"><?php echo $valor?></th>
                <?php
            }
        }
        echo "</table>";
        ?></body>

</html>