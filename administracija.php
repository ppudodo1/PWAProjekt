<?php

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '    <meta charset="UTF-8">';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '    <title>Document</title>';
echo '     <link rel="stylesheet" type="text/css" href="./style.css">'; 
echo '</head>';
echo '<body>';
echo '    <header>';
echo '        <div class="titleDiv">';
echo '            <h1 class="titleTxt">L\'OBS</h1>';
echo '        </div>';
echo '        <nav>';
echo '            <a href="index.php" class="redirectLink">Home</a>';
echo '            <a href="politika.php" class="redirectLink">Politika</a>';
echo '            <a href="nekretnine.php" class="redirectLink">Nekretnine</a>';
echo '            <a href="login.html" class="redirectLink">Administracija</a>';
echo '        </nav>';
echo '        <div class="smallDisplay">';
echo '            <a href="index.php" class="redirectLink">Home</a>';
echo '            <a href="politika.php" class="redirectLink">Politika</a>';
echo '            <a href="nekretnine.php" class="redirectLink">Nekretnine</a>';
echo '            <a href="login.html" class="redirectLink">Administracija</a>';
echo '        </div>';
echo '        <hr>';
echo '    </header>';

echo '</body>';
echo '</html>';


    session_start();
    include 'connect.php';
    define('UPLPATH', 'img/');
    $uspjesnaPrijava = false;
    if(isset($_POST["prijava"])){
        $prijavaImeKorisnika = $_POST["username"];
        $prijavaLozinkaKorisnika = $_POST["password"];
        
       

        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

        }
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,$levelKorisnika);
        mysqli_stmt_fetch($stmt);

        if (password_verify($_POST['password'], $lozinkaKorisnika) &&
            mysqli_stmt_num_rows($stmt) > 0) {
            $uspjesnaPrijava = true;
            
            if($levelKorisnika == 1) {
            $admin = true;
            }
            else {
            $admin = false;
            }
                $_SESSION['$username'] = $imeKorisnika;
                $_SESSION['$level'] = $levelKorisnika;
                
            } else {
                $uspjesnaPrijava = false;
            }
                
    } 
    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }   
    if(($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username']) && $_SESSION['$level'] == 1)) {
        echo '<div class="biggest-div">';
        $query = "SELECT * FROM clanak";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)) {
            echo '<div class="big-div">';
            echo '<form enctype="multipart/form-data" action="" method="POST">
                    <div class="form-item">
                        <label for="title">Naslov vjesti:</label>
                        <div class="form-field">
                            <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                        <div class="form-field">
                            <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="pphoto">Slika:</label>
                        <div class="form-field">
                            <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br>
                            <img src="' . UPLPATH . $row['slika'] . '" width=100px>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                <option value="politika">Politika</option>
                                <option value="nekretnine">Nekretnine</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-item">
                        <label>Spremiti u arhivu:</label>
                        <div class="form-field">';
                        if($row['arhiva'] == 0) {
                            echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                        } else {
                            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                        }
            echo '      </div>
                    </div>
                    <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                        <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                    </div>
                </form>';
            echo '</div>';
        }
        echo '<form method="post">';
        echo '<button type="submit" name="logout" class ="button-input second">Log out</button>';
        echo '</form>';
        echo '</div>';
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM clanak WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            }
            if(isset($_POST['update'])){
                    $picture = $_FILES['pphoto']['name'];
                    $title=$_POST['title'];
                    $about=$_POST['about'];
                    $content=$_POST['content'];
                    $category=$_POST['category'];
                    if(isset($_POST['archive'])){
                    $archive=1;
                    }else{
                    $archive=0;
                    }
                    $target_dir = 'img/'.$picture;
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                    $id=$_POST['id'];
                    $query = "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content',
                    slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }
                



    }else if(isset($_SESSION['$username']) && $_SESSION['$level']==0){
        echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
    }else if($uspjesnaPrijava==false){
        echo "Kriva lozinka ili korisnik ne postoji u bazi";
        echo "<br>";
        echo "<a href = 'registracija.php'>Registracija</a>";
    }
    echo ' <footer>Dominik Katavić: 0246108196</footer>';

  
    
?>