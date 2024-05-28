<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
include 'connect.php';
define('UPLPATH', 'img/');
?>
<body>
<header>
        <div class="titleDiv">
            <h1 class="titleTxt">L'OBS</h1>
        </div>
        
        <nav>

            <a href="index.php" class="redirectLink">Home</a>
            <a href="politika.php" class="redirectLink">Politika</a>
            <a href="nekretnine.php" class="redirectLink">Nekretnine</a>
            <a href="login.html" class="redirectLink">Administracija</a>
        </nav>
        <div class="smallDisplay">
            <a href="index.php" class="redirectLink">Home</a>
            <a href="politika.php" class="redirectLink">Politika</a>
            <a href="nekretnine.php" class="redirectLink">Nekretnine</a>
            <a href="login.html" class="redirectLink">Administracija</a>
        </div>
    
    </header>
    <hr>

    <section>
<?php
            $query = "SELECT * FROM clanak WHERE arhiva = 0 AND kategorija = 'politika'";
            $result = mysqli_query($dbc,$query);
            $i = 0;
            while($row = mysqli_fetch_array($result)){
               
                echo '<div class="article">';
                echo '<div class="sport_img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '" alt="Article Image">';
                echo '</div>';  // Close sport_img div
                echo '<div class="media_body">';
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id=' . $row['id'] . '">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '</div>';  // Close media_body div
                echo '</div>';  // Close article div
                   
            }
            ?>
            </section>
</body>
</html>