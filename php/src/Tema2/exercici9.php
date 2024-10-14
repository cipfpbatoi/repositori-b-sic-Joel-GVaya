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
            <span class="error"><!-- Mensaje de error para la editorial aquí --></span>
        </div>
        <div>
            <label for="price">Preu:</label>
            <input type="text" id="price" name="price" value="">
            <span class="error"><!-- Mensaje de error para el precio aquí --></span>
        </div>
        <div>
            <label for="pages">Pàgines:</label>
            <input type="text" id="pages" name="pages" value="">
            <span class="error"><!-- Mensaje de error para las páginas aquí --></span>
        </div>
        <div>
            <label for="status">Estat:</label><br>
            <?php
            foreach ($estat as $opcio) {
                echo "<input type='radio' name='status' value='$opcio' /> $opcio <br />";
            }
            ?>
            <span class="error"><!-- Mensaje de error para el estado aquí --></span>
        </div>
        <div>
            <label for="comments">Comentaris:</label><br>
            <textarea id="comments" name="comments"></textarea>
        </div>
        <div>
            Archivo: <input name="archivoEnviado" type="file" />
        </div>
        <div>
            <button type="submit" name="submit">Donar d'alta</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES['archivoEnviado']) && $_FILES['archivoEnviado']['error'] == 0) {
            $allowedMimeTypes = array("image/jpeg", "image/png", "image/gif");
            $fileType = mime_content_type($_FILES['archivoEnviado']['tmp_name']);
            $uploadedFilePath;

            if (in_array($fileType, $allowedMimeTypes)) {

                $nombre = basename($_FILES['archivoEnviado']['name']);
                $destination = "./imagenes/$nombre";
                $uploadedFilePath = $destination;
                if (move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], $destination)) {
                    echo "<p>Archivo $nombre subido con éxito</p>";
                } else {
                    echo "<p class='error'>Error al mover el archivo.</p>";
                }
            } else {
                echo "<p class='error'>Tipo de archivo no permitido. Solo se permiten JPEG, PNG y GIF.</p>";
            }
        }
        $module = htmlspecialchars($_POST['module']);
        $publisher = htmlspecialchars($_POST['publisher']);
        $price = htmlspecialchars($_POST['price']);
        $pages = htmlspecialchars($_POST['pages']);
        $status = isset($_POST['status']) ? htmlspecialchars($_POST['status']) : "No seleccionat";
        $comment = htmlspecialchars($_POST['comments']);

        echo "<h1>Taula de Dades</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Mòdul</th><td>$module</td></tr>";
        echo "<tr><th>Editorial</th><td>$publisher</td></tr>";
        echo "<tr><th>Preu</th><td>$price</td></tr>";
        echo "<tr><th>Pàgines</th><td>$pages</td></tr>";
        echo "<tr><th>Estat</th><td>$status</td></tr>";
        echo "<tr><th>Comentaris</th><td>$comment</td></tr>";
        echo "<tr><th>Imatge</th><td><img src='$uploadedFilePath' width='200' /></td></tr>";
        echo "</table>";
    }
    ?>
</body>

</html>
