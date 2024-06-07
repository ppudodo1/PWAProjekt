<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Document</title>
</head>
<body>
<?php
        session_start();
        if(isset($_SESSION['$username']) && $_SESSION['$username'] != "" && isset($_SESSION['$level']) && $_SESSION['$level'] == 1){
            header('Location: administracija.php');
            exit(); 
            
        }
    ?>
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
        <hr>
    </header>
 
    <div class="form-wrapper">
        <form action="administracija.php" method="post">
            <input type="text" name="username" placeholder="username">
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            <input type="submit" name="prijava" value="Log in">
        </form>
        <p>Nemate račun? Napravite ga ovdje</p>
        <a href="./registracija.php">Registracija</a>
    </div>
    
    <footer>Dominik Katavić: 0246108196</footer>

</body>
</html>