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
    $ejemplo = array(10, 0);
    function imprimir_array($array)
    {
    ?>
        <tr>
            <?php
            for ($i = 0; $i < count($array); $i++) {
            ?>
                <td><?php echo $i; ?></td>
            <?php
            }
            ?>
        </tr>
        <?php
        ?>
        <tr>
            <?php
            foreach ($array as &$value) {
            ?>
                <td><?php echo $value; ?></td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    ?>
    <table>
        <?php
        imprimir_array($ejemplo);
        ?>
    </table>
</body>

</html>