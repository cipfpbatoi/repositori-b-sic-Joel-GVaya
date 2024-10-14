<?php
function multiplicarArrays($tablas) {
    for ($i = 0; $i < count($tablas[0]); $i++) {
        for ($j = 0; $j < count($tablas[1]); $j++) {
            echo "<li>" . $tablas[0][$i] . "*" . $tablas[1][$j] . "=" . $tablas[0][$i] * $tablas[1][$j] ."</li>";
        }
        echo"<br>";
    }
}
$tablas = array(
    array(1, 2, 3, 4, 5, 6, 7, 8, 9),
    array(1, 2, 3, 4, 5)
);

?>

<html>
    <bod>
        <ul>
            <?php multiplicarArrays($tablas); ?>
        </ul>
    </bod>
</html>

