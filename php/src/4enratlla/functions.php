<?php
function iniciarTabla() {
    $graella = array();
    for ($i = 0; $i < 6; $i++) {
        $fila = array_fill(0, 7, 0);
        $graella[] = $fila;
    }
    return $graella;
}
function pintarTabla($tabla) {
    echo '<table>';
    for ($i = 0; $i < 6; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 7; $j++) {
            if ($tabla[$i][$j] == 1) {
                echo '<td class="player1"></td>';
            } elseif ($tabla[$i][$j] == 2) {
                echo '<td class="player2"></td>';
            } else {
                echo '<td class="buid"></td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

function ferMoviment(&$tabla, $columna, $jugadorActual) {
    for ($i = 5; $i >= 0; $i--) {
        if ($tabla[$i][$columna] == 0) {
            $tabla[$i][$columna] = $jugadorActual;
            return true;
        }
    }
    return false;
}

function reinicio(){
    $_SESSION['tabla'] = iniciarTabla();
    $_SESSION['jugador'] = 1;
}

