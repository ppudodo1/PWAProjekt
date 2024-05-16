<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'connect.php';
define('UPLPATH', 'img/');
?>
<body>
    <nav>
        <a href="unos.php">Administracija</a>
    </nav>
    <section>
        <?php
            $query = "SELECT * FROM clanak WHERE arhiva = 0";
            $result = mysqli_query($dbc,$query);
            $i = 0;
            while($row = mysqli_fetch_array($result)){
                echo '<article>';
                    echo'<div class="article">';
                    echo '<div class="sport_img">';
                    echo '<img src="' . UPLPATH . $row['slika'] . '"';
                    echo '</div>';
                    echo '<div class="media_body">';
                    echo '<h4 class="title">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</div></div>';
                    echo '</article>';
            }
        ?>

    </section>
</body>
</html>