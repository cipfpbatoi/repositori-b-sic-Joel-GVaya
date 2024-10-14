<?php

function combprobarLetra($frase, $letra, $array)
{
    for ($i = 0; $i < strlen($frase); $i++) {
        if ($frase[$i] === $letra) {
            $array[$i] = $letra;
        }
    }
    ;
    if (completado($frase, array: $array)) {
        reinicio();
        header("Location: completado.php");
        exit;
    }
    return $array;
}


function completado($frase, $array)
{
    $frasearray = implode("", $array);
    return $frase == $frasearray;

}


function crearFraseSecreta($frase)
{
    $frasearray = array_fill(0, strlen($frase), "_");
    if (!isset($_SESSION["frasearray"])) {
        $_SESSION['frasearray'] = $frasearray;
    }
    return $frasearray;
}


function reinicio()
{
    unset($_SESSION['intents']);
    unset($_SESSION['frasearray']);
}

