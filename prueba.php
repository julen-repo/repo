<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class main extends Exception {}
    class submain extends main {}

    try {
        throw new submain("sal algo");
    } catch (Exception $e) {
        echo "a";
    } catch (main $e) {
        echo "aa";
    } catch (submain $e) {
        echo "aaa";
    }
    ?>
</body>

</html>