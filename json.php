<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $frutas = array("Manzana" => "Roja", "Plátano" => "Amarillo", "Naranja" => "Naranja");

        echo json_encode($frutas, JSON_UNESCAPED_UNICODE);
    ?>
</body>
</html>
