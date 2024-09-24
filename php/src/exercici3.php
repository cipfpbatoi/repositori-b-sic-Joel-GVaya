<?php
function calcularMediana($numeros){
    $media = 0;
    $contador = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        $media = $media + $numeros[$i];
        $contador++;
    }
    return $media / $contador;
}

function calcularmediana1($numeros) {
    return array_sum($numeros) / count($numeros);
}

function mostrarArray($numeros){
    for ($i = 0; $i < count($numeros); $i++) {
        echo "<li>" . $numeros[$i] . "</li>";
    };
}
$numeros = array(2, 3, 4, 5, 6);

?>
<html>
    <body>
        <h1>Numeros del array</h1>
        <ul>
            <?php mostrarArray($numeros); ?>
        </ul>
        <h1>Calcular Mmedia de numeros</h1>
        <li><?php echo $media = calcularMediana($numeros) ?></li>
    </body>
</html>