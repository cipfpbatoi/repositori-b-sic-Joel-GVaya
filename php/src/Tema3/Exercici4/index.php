<?php
session_start();

// Generar un token CSRF si no existeix
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Comprovar si l'usuari ha enviat el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprovar el token CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Error CSRF");
    }

    // Processar el formulari
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $successMessage = "Missatge enviat per $name ($email): $message";
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari de contacte</title>
</head>
<body>
    <h1>Formulari de contacte</h1>
    <?php if (isset($successMessage)): ?>
        <p><?php echo $successMessage; ?></p>
    <?php else: ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name">
            <br>
            <label for="email">Correu electrònic:</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="message">Missatge:</label>
            <textarea id="message" name="message"></textarea>
            <br>
            <input type="submit" value="Enviar">
        </form>
    <?php endif; ?>
</body>
</html>