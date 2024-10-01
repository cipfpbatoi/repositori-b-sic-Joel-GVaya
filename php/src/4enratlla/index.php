<?php
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tabla = json_decode($_POST['tabla'], true);
    $jugadorActual = intval($_POST['jugadorActual']);

    if (($_POST['columna'])) {
        $columna = intval($_POST['columna']);
        if ($columna >= 0 && $columna <= 6) {
            ferMoviment($tabla, $columna, $jugadorActual);
            $jugadorActual = $jugadorActual == 1 ? 2 : 1;
        }
    }
} else {
    $tabla = iniciarTabla();
    $jugadorActual = 1;
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
    <?php pintarTabla($tabla); ?>

    <form method="POST">
        <label for="columna">Tria una columna (0-6): </label>
        <select name="columna" id="columna">
            <?php for ($i = 0; $i < 7; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <input type="submit" value="Confirmar">

        <input type="hidden" name="tabla" value='<?= json_encode($tabla) ?>'>
        <input type="hidden" name="jugadorActual" value="<?= $jugadorActual ?>">
    </form>
</body>
</html>
