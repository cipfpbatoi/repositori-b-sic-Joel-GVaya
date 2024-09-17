<?php
function sumar($num1, $num2) {
    echo $num1 + $num2 . "<br />";
}

function restar($num1, $num2) {
    echo $num1 - $num2 . "<br />";
}

function multiplicar($num1, $num2) {
    echo $num1 * $num2 . "<br />";
}

function dividir($num1, $num2) {   
    echo $num1 / $num2;
} 

$num1 = 2;
$num2 = 2;

sumar($num1, $num2);
restar($num1, $num2);
multiplicar($num1, $num2); 
dividir($num1, $num2);