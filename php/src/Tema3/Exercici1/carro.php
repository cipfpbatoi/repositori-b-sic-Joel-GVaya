<?php
session_start();

if (isset($_GET['eliminar'])) {
    $producteAEliminar = $_GET['eliminar'];
    if (isset($_SESSION['carrito'][$producteAEliminar])) {
        if($_SESSION['carrito'][$producteAEliminar] > 1){
            $_SESSION['carrito'][$producteAEliminar]--;
        }else{
            unset($_SESSION['carrito'][$producteAEliminar]) ;
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Carret de compres</title>
</head>
<body>
    <h1>El teu carret de compres</h1>
    
    <?php if (!empty($_SESSION['carrito'])): ?>
        <ul>
            <?php foreach ($_SESSION['carrito'] as $producte => $quantitat): ?>
                <li>
                    <?php echo ($producte) . ' - Quantitat: ' . $quantitat; ?>
                    <a href="carro.php?eliminar=<?php echo urlencode($producte); ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>El teu carret està buit.</p>
    <?php endif; ?>
    
    <a href="index.php">Tornar a seleccionar productes</a>
</body>
</html>
