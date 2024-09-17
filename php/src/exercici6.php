<?php
function nota($numero) {
    $result = match ($numero) {
        10=> "Excelent",
        9=> "Molt be",
        8=> "Molt be",
        7=> "Be",
        6=> "Be",
        5=> "Be",
        default => "Insuficient",
    };
    echo $result;
}

for ($i = 0; $i <= 10; $i++) {
    nota($i);
    echo"<br />";
}

