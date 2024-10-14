<?php

include("function.php");

session_start();


if (!$_SESSION) {
    header("Location: ../projecte.php");
    exit;
}

$frase = "ofegat";
$frasearray = crearFraseSecreta($frase);
if (!isset($_SESSION['frasearray'])) {
    $_SESSION['frasearray'] = crearFraseSecreta($frase);
}
if (!isset($_SESSION["intents"])) {
    $_SESSION['intents'] = 6;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['intents'] -= 1;
    if (isset($_POST['submit'])) {
        $_SESSION['frasearray'] = combprobarLetra($frase, $_POST['lletra'], $_SESSION['frasearray']);
        $frasearray = $_SESSION['frasearray'];
    } elseif (isset($_POST['reiniciar'])) {
        $_SESSION['frasearray'] = crearFraseSecreta($frase);
        $frasearray = $_SESSION['frasearray'];
    } elseif (isset($_POST['inicio'])) {
        reinicio();
        header('Location: ../triarjoc.php');
    }
    if ($_SESSION['intents'] === 0) {
        reinicio();
        header("Location: perdido.php");
        exit;
    }
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
    <a>Intents restants: <?php echo $_SESSION['intents'] ?></a>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <div>
            <label for="lletra">Lletra:</label>
            <input type="text" id="lletra" name="lletra" maxlength="1">
            <button type="submit" name="submit">Probar</button>
        </div><br>
        <div>
            <button type="submit" name="reiniciar">Reiniciar</button>
            <button type="submit" name="inicio">Volver al inicio</button>
        </div>
    </form>

</body>

</html>