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
            for ($i = 1;$i<=10;$i++) {
                echo "<tr>";
                for ($j = 1;$j<=10;$j++) {
                    echo "<th>$j</th>";
                }
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
</body>

</html>