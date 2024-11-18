<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2px">
        <tr>
            <?php
            $i = 0;
            while ($i < 10) {
                $i++;
                echo "<th>$i</th>";
            }
            ?>
        </tr>
    </table>
</body>

</html>