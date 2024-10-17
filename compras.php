<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 
<body>
    <h2>Selecciona lo que quieres comprar</h1>
        <form action="procesarCompras.php" method="post">
            <label><input type="checkbox" name="articulos[lapiz]" value="1">Lápiz - 1€</label><br>
            <label><input type="checkbox" name="articulos[libro]" value="15.50">Libro - 15.50€</label><br>
            <label><input type="checkbox" name="articulos[estuche]" value="4.75">Estuche - 4.75€</label><br>
            <label><input type="checkbox" name="articulos[carpeta]" value="3">Carpeta - 3€</label><br>
            <input type="submit" value="Enviar">
        </form>
</body>
 
</html>