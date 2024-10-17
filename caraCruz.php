<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $caraCruz = rand(0,1);
        if($caraCruz==0){
    ?>
    <img src="https://www.ecb.europa.eu/euro/coins/common/shared/img/lv/Latvia_1euro.jpg" alt="Cara">
    <?php   
        }else{
    ?>
    <img src="https://i.ebayimg.com/images/g/ersAAOSwpFRkCBdq/s-l1200.jpg" alt="Cruz">
    <?php 
        }
    ?>
</body>
</html>