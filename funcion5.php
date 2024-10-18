<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php 
         include 'funciones.php';
         $ejemplo = array(10, 0);
    ?>
    <table>
    <?php 
         imprimir_array($ejemplo);
    ?>
    </table>
    <?php 
         imprimir_tablas_multiplicar(4,10);
    ?>
</body>

</html>