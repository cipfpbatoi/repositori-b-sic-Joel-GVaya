<?php
$errors = [];
$name = $email = "";
$patternPassword = "/^[A-Za-z0-9]{6,}$/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El email no es valido";
    }

    if (empty($_POST["password"]) || empty($_POST["confirm_password"])) {
        $errors[] = "Has d'introduir la contrasenya i confirmar-la.";
    } else {
        if ($_POST["password"] != $_POST["confirm_password"]) {
            $errors[] = "Les contrasenyes no coincideixen";
        }else{
            if (!preg_match($patternPassword, $_POST["password"])) {
                $errors[] = "La contraseña es incorrecta";
            }
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de registre</title>
</head>

<body>
    <h2>Formulari de Registre</h2>
    <form action="" method="post" autocomplete="off">
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
        </div>
        <div>
            <label for="email">Correu electrònic:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <div>
            <label for="password">Contrasenya:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="confirm_password">Confirma la contrasenya:</label>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        <div>
            <button type="submit">Registrar-se</button>
        </div>
    </form>

    <?php
    if (!empty($errors)) {
        echo "<h3>Hi ha errors en el formulari:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li style='color: red';>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<a style='color: green';>Dades introduides correctament</a>";
    }
    ?>
</body>

</html>