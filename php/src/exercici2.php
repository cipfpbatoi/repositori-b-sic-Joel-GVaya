<?php
function ambfor () {
    for ($i = 0; $i <= 20; $i++) {
        if  ($i %2== 0) {  
            echo $i;
        }
    }
}

function ambwhile() {
    $i = 0;
    while($i <= 20) {   
        if  ($i %2== 0) {  
            echo $i;
        }
        $i++;
    }
}


ambfor();
echo "<br />";
ambwhile();