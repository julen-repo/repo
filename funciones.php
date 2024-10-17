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
    
    function imprimir_tablas_multiplicar($inicio, $fin) {
        ?>
        <table>
            <tr>
                <th>Número</th>
                <?php
                for ($j = 1; $j <= 10; $j++) {
                    echo "<th>$j</th>";
                }
                ?>
            </tr>
            <?php
            for ($i = $inicio; $i <= $fin; $i++) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <?php
                    for ($j = 1; $j <= 10; $j++) {
                        ?>
                        <td><?php echo $i * $j; ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
?>