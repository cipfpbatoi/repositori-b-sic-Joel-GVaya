<?php
include("function.php");

$frase = "ofegat";
$frasearray = array_fill(0, strlen($frase), "_");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $frasearray = combprobarLetra($frase, $_POST['lletra'], $frasearray);
    
    }
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Ofegat</title>
</head>

<body>
    <h1>Frase</h1>
    <?php
        for ($i = 0; $i < count($frasearray); $i++) {
            echo "<a>" . $frasearray[$i] . " </a>";
        }
        echo "<br>";
    ?><br>

    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="lletra">Lletra:</label>
            <input type="text" id="lletra" name="lletra" maxlength="1" required>
        </div>
        <div>
            <button type="submit" name="submit">Probar</button>
        </div>
    </form>
</body>

</html>
