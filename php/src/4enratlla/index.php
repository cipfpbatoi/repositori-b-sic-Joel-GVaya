<?php
include("functions.php");

session_start();

if (!$_SESSION) {
    header("Location: ../projecte.php");
    exit;
}
if (!isset($_SESSION['tabla'])) {
    $_SESSION['tabla'] = iniciarTabla();
    $_SESSION['jugador'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reiniciar'])) {
        reinicio();
    } elseif (isset($_POST['inicio'])) {
        reinicio();
        header('Location: ../triarjoc.php');
    } elseif (isset($_POST['sessio'])) {
        header('Location: ../cerrarsesion.php');
    }
    if (($_POST['columna'])) {
        $columna = intval($_POST['columna']);
        if ($columna >= 0 && $columna <= 6) {
            ferMoviment($_SESSION['tabla'], $columna, $_SESSION['jugador']);
            $_SESSION['jugador'] = $_SESSION['jugador'] == 1 ? 2 : 1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 en Ratlla</title>
    <link rel="stylesheet" href="estil.css">
</head>

<body>
    <h1 style="text-align: center;">4 en Ratlla</h1>
    <?php pintarTabla($_SESSION['tabla']); ?>

    <form method="POST">
        <label for="columna">Tria una columna (0-6): </label>
        <select name="columna" id="columna">
            <?php for ($i = 0; $i < 7; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <input type="submit" value="Confirmar">
        <div>
            <button type="submit" name="reiniciar">Reiniciar</button>
            <button type="submit" name="inicio">Volver al inicio</button>
            <button type="submit" name="sessio">Cerrar session</button>
        </div>
    </form>
</body>

</html>