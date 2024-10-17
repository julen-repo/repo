<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        if (isset($_GET["enviar"])){
            if(isset($_GET["fruta"])=="manzana"){
                echo '<image src="https://comedelahuerta.com/wp-content/uploads/2019/09/MANZANA-ROYAL-GALA-ECOLOGICO-COMEDELAHUERTA-1.jpg">';
            }elseif(isset($_GET["fruta"])=="platano"){
                echo '<image src="https://esnaturalbarcelona.com/wp-content/uploads/2018/09/platanos-de-canarias.jpg">';
            }elseif(isset($_GET["fruta"])=="fresa"){
                echo '<image src="https://libbys.es/wordpress/wp-content/uploads/2018/05/fresas.jpg">';
            }
        }else{
    ?>
    <form action="formulario1.php" method="get">
        <input type="radio" value="manzana" name="fruta">Manzana
        <input type="radio" value="platano" name="fruta" checked>Platano
        <input type="radio" value="fresa" name="fruta">Fresa
        <input type="submit" name="enviar" value="Submit">
    </form>
    <?php 
        }
    ?>
</body>

</html>