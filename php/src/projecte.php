<?php
session_start();


$users = [
    'joel' => '1234',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] == $password || isset($_COOKIE['session'])) {
        $_SESSION['username'] = $username;
        setcookie('session', $username, time() + 3600);
        header("Location: triarjoc.php");
        exit;
    } else {
        $error = "Nom d'usuari o contrasenya incorrecte!";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici de sessió</title>
</head>

<body>
    <h2>Iniciar sessió</h2>

    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form method="POST" action="">
        <label for="username">Nom d'usuari:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Contrasenya:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Inicia sessió</button>
    </form>
</body>

</html>