<!DOCTYPE html>
<?php
    $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis juegos favoritos</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <?php
        $datosJuego = "Select * from tJuegos where id = " . $_GET["id"];
        $resultJuego = mysqli_query($db, $datosJuego) or die("Query error");
        while($juego = mysqli_fetch_array($resultJuego)) {
            echo "<section>";
            echo "<h1>" . $juego["nombre"] . "</h1>";
            echo "<figure ><img src='" . $juego["url_imagen"] . "' alt ='" . $juego["nombre"] . "'></figure>";
            echo "<article><h3>Género</h3>";
            echo "<p>" . $juego["genero"] . "</p></article>";
            echo "<article><h3>Desarrolladora</h3>";
            echo "<p>" . $juego["desarrolladora"] . "</p></article>";
            echo "</section>";
        }
        

        echo "<br><h3>Comentarios</h3>";
        $datosComentario = "Select * from tComentarios where juego_id = " . $_GET["id"];
        $resultComentario = mysqli_query($db, $datosComentario) or die("Query Error");
        while($comentario = mysqli_fetch_array($resultComentario)){
            echo "<p>" . $comentario["comentario"] . "</p>";
        }

        echo "<br><a href='/main.php'>Volver al inicio</a>";

        mysqli_close($db);
    ?>
</body>
</html>