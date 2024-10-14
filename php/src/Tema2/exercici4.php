<?php
use function PHPUnit\Framework\matches;
function contarVocales($cadena){
    $vocales = 0;
    $array = str_split($cadena);
    for ($i = 0; $i < count($array); $i++) {
        if (in_array($array[$i], ['a', 'e', 'i', 'o', 'u'])) {
            $vocales++;
        }
    }
    echo $vocales;
}


function ContarVocales1($cadena) {
$vocales = ['a', 'e', 'i', 'o', 'u'];
$total = 0;
foreach($vocales as $vocal){
    
    $total += substr_count($cadena, $vocal);
}
return $total;
}
$cadena = "hola me llamo joel"

?>

<html>
    <body>
        <a>Frase utilizada para contar vocales:</a><br>
        <?php echo $cadena ?><br>
        <a>Vocales que contiene la frase:</a><br>
        <?php contarVocales(strtolower($cadena)) ?>
    </body>
</html>