<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["articulos"]) && !empty($_POST["articulos"])) {
        $articulos = $_POST['articulos'];
        $total = 0;
    ?>
        <h2>Detalle de la compra</h2>
        <ul>
            <?php
            foreach ($articulos as $articulo => $precio) {
                echo "<li>$articulo - $precio €</li>";
                $total += $precio;
            }
            ?>
        </ul>
        <strong>Total: <?php echo $total . "€"; ?></strong>
    <?php
    } else {
        echo "No has comprado nada.";
    }
    ?>
</body>

</html>