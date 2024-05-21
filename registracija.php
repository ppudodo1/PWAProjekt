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
        <div>L'OBS</div>
        <nav>

            <a href="index.php">Home</a>
            <a href="politika.php">Politika</a>
            <a href="nekretnine.php">Nekretnine</a>
            <a href="unos.php">Administracija</a>
        </nav>
</header>

    <section role="main">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="from-item">
                <span id="porukaIme" class="bojaPoruke"></span>
                <label for="title">Ime: </label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" class="form-field-textual">

                </div>
            </div>
            <div class="form-item">
                <span id="porukaPrezime"></span>
                <label for="about">Prezime: </label>
                <div class="form-field">
                <input type="text" name="prezime" id="prezime" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaUsername" class="bojaPoruke"></span>
                <label for="content">Korisničko ime:</label>
              
                
                <div class="form-field">
                    <input type="text" name="username" id="username" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPass" class="bojaPoruke"></span>
                <label for="pphoto">Lozinka: </label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPassRep" class="bojaPoruke"></span>
                <label for="pphoto">Ponovite lozinku: </label>
                <div class="form-field">
                    <input type="password" name="passRep" id="passRep"
                    class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <button type="submit" value="Prijava"
                id="slanje">Prijava</button>
            </div>
        </form>

    </section>


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