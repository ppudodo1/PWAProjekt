<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
        <nav>

            <a href="index.php">Home</a>
            <a href="politika.php">Politika</a>
            <a href="nekretnine.php">Nekretnine</a>
            <a href="unos.php">Administracija</a>
        </nav>
    </header>
   <?php
   include 'connect.php';
   define('UPLPATH', 'img/');
    if(isset($_GET["id"]))
        $id = $_GET["id"];
        
        $query = "SELECT * from clanak WHERE id = $id";
        $result = mysqli_query($dbc,$query);
        while($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo'<div class="article">';
            echo '<h4 class="title">';
            echo $row['naslov'];
            echo '</h4>';
            echo '<div class="sport_img">';
            echo '<img src="' . UPLPATH . $row['slika'] . '"';
            echo '<br>';
            echo '<p>';
            echo $row['sazetak'];
            echo '</p>';
            echo '<br>';
            echo 'Objavljeno : ';
            echo $row['datum'];
            echo '<br>';
            echo '<p>';
            echo $row['tekst'];
            echo '</p>';
            echo '</div>';
    
            echo '</div>';
            echo '</article>';
            }
   ?>
</body>
</html>