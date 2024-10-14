<?php
session_start();

// Inicialitzar la llista de pàgines visitades si no existeix
if (!isset($_SESSION['pages'])) {
    $_SESSION['pages'] = [];
}

// Afegir la pàgina actual a la llista de pàgines visitades
$_SESSION['pages'][] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Activitat de l'usuari</title>
</head>
<body>
    <h1>Activitat de l'usuari</h1>
    <ul>
        <?php foreach ($_SESSION['pages'] as $page): ?>
            <li><?php echo $page; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>