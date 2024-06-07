<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
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
            <a href="login.php" class="redirectLink">Administracija</a>
        </nav>
        <div class="smallDisplay">
            <a href="index.php" class="redirectLink">Home</a>
            <a href="politika.php" class="redirectLink">Politika</a>
            <a href="nekretnine.php" class="redirectLink">Nekretnine</a>
            <a href="login.php" class="redirectLink">Administracija</a>
        </div>
    <hr>
    </header>

    <main role="main" class="register-container">
        <form action="" method="POST" enctype="multipart/form-data" class="test">
            <div class="from-item">
                <span id="porukaIme" class="bojaPoruke"></span>
                
                <div class="form-field">
                    <input type="text" name="ime" id="ime" class="login-input" placeholder="ime">

                </div>
            </div>
            <div class="form-item">
                <span id="porukaPrezime"></span>
              
                <div class="form-field">
                <input type="text" name="prezime" id="prezime" class="login-input" placeholder="prezime">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaUsername" class="bojaPoruke"></span>
              
                <div class="form-field">
                    <input type="text" name="username" id="username" class="login-input" placeholder="korisnicko ime">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPass" class="bojaPoruke"></span>
                
                <div class="form-field">
                    <input type="password" name="pass" id="pass" class="login-input" placeholder="lozinka">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPassRep" class="bojaPoruke"></span>
               
                <div class="form-field">
                    <input type="password" name="passRep" id="passRep"
                    class="login-input" placeholder="lozinka">
                </div>
            </div>
            <div class="form-item">
                <button type="submit" value="Prijava"
                id="slanje" class="button-input">Prijava</button>
            </div>
        </form>

</main>


    <?php
        include 'connect.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ime = $_POST["ime"];
            $prezime = $_POST["prezime"];
            $username = $_POST["username"];
            $lozinka =$_POST["pass"];
            $hashed_password = password_hash($lozinka,CRYPT_BLOWFISH);
            $razina = 0;
            $registriraniKorisnik = "";
    
            $sql = "SELECT korisnicko_ime FROM korisnik where korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($dbc);
    
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            if(mysqli_stmt_num_rows($stmt)>0){
                $msg = 'Korisnicko ime vec postoji';
            }else{
                $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($stmt,$sql)){
                    mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                    mysqli_stmt_execute($stmt);
                    $registriraniKorisnik = true;
                }
    
            }
            mysqli_close($dbc);
            if($registriraniKorisnik == true){
                echo '<p>Korisnik je uspjesno registriran! </p>';
            }else{
    
            }
        }
        
    ?>
</body>
</html>