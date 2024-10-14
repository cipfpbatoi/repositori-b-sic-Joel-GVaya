<?php
session_start();

// Inicialitzar variables d'error i missatge de benvinguda
$error = "";
$welcomeMessage = "";

// Comprovar si l'usuari ha enviat el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprovar les credencials de l'usuari
    if ($_POST['username'] == 'usuari' && $_POST['password'] == 'contrasenya') {
        // Iniciar sessió i emmagatzemar l'estat d'autenticació
        $_SESSION['authenticated'] = true;
        $welcomeMessage = "Benvingut, " . $_POST['username'] . "!";

        // Emmagatzemar el nom d'usuari en una cookie si s'ha seleccionat "recordar-me"
        if (isset($_POST['remember'])) {
            setcookie('username', $_POST['username'], time() + 3600 * 24 * 30, '/', '', true, true);
        }
    } else {
        $error = "Credencials incorrectes. Si us plau, intenta-ho de nou.";
    }
}

// Comprovar la cookie de recordatori i iniciar sessió automàticament si existeix
if (!$_SESSION['authenticated'] && isset($_COOKIE['username'])) {
    $_SESSION['authenticated'] = true;
    $welcomeMessage = "Benvingut, " . $_COOKIE['username'] . "!";
}

// Tancar sessió si s'ha enviat la sol·licitud
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Inici de sessió</title>
</head>
<body>
    <h1>Inici de sessió</h1>
    <?php if ($_SESSION['authenticated']): ?>
        <p><?php echo $welcomeMessage; ?></p>
        <a href="index.php?logout=true">Tancar sessió</a>
    <?php else: ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Nom d'usuari:</label>
            <input type="text" id="username" name="username" value="<?php echo $_COOKIE['username'] ?? ''; ?>">
            <br>
            <label for="password">Contrasenya:</label>
            <input type="password" id="password" name="password">
            <br>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Recorda'm</label>
            <br>
            <input type="submit" value="Iniciar sessió">
        </form>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>