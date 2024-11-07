<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Usuario: <?php echo $_GET["usuario"]?></th>
            <th><a href="index.php">Home</a></th>
            <th><a href="index.php">Ver carrito</a></th>
            <th><a href="index.php">Cerrar sesion</a></th>
        </tr>
    </table>
    <h1>Lista de categorias</h1>
    <ul>
        <li><a href="index.php">Bebidas con alcohol</a></li>
        <li><a href="index.php">Bebidas sin alcohol</a></li>
        <li><a href="index.php">Comida</a></li>
    </ul>
</body>

</html>