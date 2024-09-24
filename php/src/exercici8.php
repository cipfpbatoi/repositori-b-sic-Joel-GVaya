<?php
    $modul = array("Rojo", "Blanco", "Amarillo", "Negro", "Verde");
    $estat = array("Nou", "SegonaMa", "Vell", "Reutilitzat");
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module">
            <?php
                foreach ($modul as $opcio) {
                    echo "<option value=\"$opcio\">$opcio</option>";
                }
            ?>
        </select>
        <span class="error"></span>
    </div>
    <div>
        <label for="publisher">Editorial:</label>
        <input type="text" id="publisher" name="publisher" value="">
        <span class="error"><!-- Missatge d'error per a l'editorial aquí --></span>
    </div>
    <div>
        <label for="price">Preu:</label>
        <input type="text" id="price" name="price" value="">
        <span class="error"><!-- Missatge d'error per al preu aquí --></span>
    </div>
    <div>
        <label for="pages">Pàgines:</label>
        <input type="text" id="pages" name="pages" value="">
        <span class="error"><!-- Missatge d'error per a les pàgines aquí --></span>
    </div>
    <div>
        <label for="status">Estat:</label><br>
        <?php
            foreach ($estat as $opcio) {
                echo "<input type='radio' name='status' value='$opcio' /> $opcio <br />";
            }
        ?>
        <span class="error"><!-- Missatge d'error per l'estat aquí --></span>
    </div>
    <div>
        <label for="comments">Comentaris:</label>
        <textarea id="comments" name="comments"></textarea>
    </div>
    <div>
        <button type="submit">Donar d'alta</button>
    </div>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $module = $_POST['module'];
        $publisher = $_POST['publisher'];
        $price = $_POST['price'];
        $pages = $_POST['pages'];
        $status = isset($_POST['status']) ? $_POST['status'] : "No seleccionat";
        $comment = $_POST['comments'];

        echo "<h1>Taula de Dades</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Mòdul</th><td>$module</td></tr>";
        echo "<tr><th>Editorial</th><td>$publisher</td></tr>";
        echo "<tr><th>Preu</th><td>$price</td></tr>";
        echo "<tr><th>Pàgines</th><td>$pages</td></tr>";
        echo "<tr><th>Estat</th><td>$status</td></tr>";
        echo "<tr><th>Comentaris</th><td>$comment</td></tr>";
        echo "</table>";
    }
?>
</body>
</html>
