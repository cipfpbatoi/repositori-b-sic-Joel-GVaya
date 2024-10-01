<?php

    function combprobarLetra($frase, $letra, $array) {
        for ($i = 0; $i < strlen($frase); $i++) {
            if($frase[$i] === $letra){
                $array[$i] = $letra;
            }
        };
        return $array;
    }

