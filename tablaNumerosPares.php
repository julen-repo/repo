<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2px">
            <?php
            $i =  0;
            
            while ($i < 100) {
                if($i % 20 == 0) {
                    echo "<tr>";
                    echo "</tr>";
                }
                if ($i % 2 == 0) {
                    echo "<th>$i</th>";
                }
                $i++;
            }
            ?>
    </table>
</body>

</html>