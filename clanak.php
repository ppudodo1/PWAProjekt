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
   <?php
   include 'connect.php';
   define('UPLPATH', 'img/');
    if(isset($_GET["id"]))
        $id = $_GET["id"];
        
        $query = "SELECT * from clanak WHERE id = $id";
        $result = mysqli_query($dbc,$query);
        while($row = mysqli_fetch_array($result)) {
           if($row['kategorija']=="politika"){
                echo '<p class="categorySubtitle"> Lobs > Politika</p>';
           }
            echo '<div class="clanakContainer">';
            echo '<h1 class="articleTitle">';
            echo $row['naslov'];
            echo '</h1>';
            echo '<div class="clanak_img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '" alt="Image">';
            echo '</div>';  // Close sport_img div
            echo '<p>';
            echo $row['sazetak'];
            echo '</p>';
            echo '<p class="datumObj">';
            echo 'Objavljeno : ' . $row['datum'];
            echo '</p>';
            echo '<p>';
            echo $row['tekst'];
            echo '</p>';
            echo '</div>';
          
            }
   ?>
       <footer>Dominik Katavić: 0246108196</footer>

</body>
</html>