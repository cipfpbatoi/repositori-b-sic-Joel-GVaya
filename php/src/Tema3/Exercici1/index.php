<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_POST['producte'])) {
    $producte = $_POST['producte'];
    
    if (isset($_SESSION['carrito'][$producte])) {
        $_SESSION['carrito'][$producte]++;
    } else {
        $_SESSION['carrito'][$producte] = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Selecció de productes</title>
</head>
<body>
    <h1>Afegir productes al carret</h1>
    <form action="index.php" method="POST">
        <label for="producte">Tria un producte:</label>
        <select name="producte" id="producte">
            <option value="Poma">Poma</option>
            <option value="Platan" default>Platan</option>
            <option value="Taronja">Taronja</option>
        </select>
        <input type="submit" value="Afegir al carret">
    </form>
    <a href="carro.php">Veure carret</a>
</body>
</html>
