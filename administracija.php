<?php
    session_start();
    include 'connect.php';
    define('UPLPATH', 'img/');
    $uspjesnaPrijava = false;
    if(isset($_POST["prijava"])){
        $prijavaImeKorisnika = $_POST["username"];
        $prijavaLozinkaKorisnika = $_POST["password"];
        
        //echo $prijavaImeKorisnika;

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
        header("Location: login.html");
        exit();
    }   
    if(($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level']==1){
        $query = "SELECT * FROM clanak";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)) {
        echo '<form enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
            <label for="title">Naslov vjesti:</label>
            <div class="form-field">
            <input type="text" name="title" class="form-field-textual"
            value="'.$row['naslov'].'">
            </div>
            </div>
            <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50
            znakova):</label>
            <div class="form-field">
            <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
            </div>
            </div>
            <div class="form-item">
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
            <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
            </div>
            </div>
            <div class="form-item">
            <label for="pphoto">Slika:</label>
            <div class="form-field">
            <input type="file" class="input-text" id="pphoto"
            value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .
            $row['slika'] . '" width=100px>
            
            </div>
            </div>
            <div class="form-item">
            <label for="category">Kategorija vijesti:</label>
            <div class="form-field">
            <select name="category" id="" class="form-field-textual"
            value="'.$row['kategorija'].'">
            <option value="politika">Politika</option>
            <option value="nekretnine">Nekretnine</option>
            </select>
            </div>
            </div>
            <div class="form-item">
            <label>Spremiti u arhivu:
            <div class="form-field">';
            if($row['arhiva'] == 0) {
            echo '<input type="checkbox" name="archive" id="archive"/>
            Arhiviraj?';
            } else {
            echo '<input type="checkbox" name="archive" id="archive"
            checked/> Arhiviraj?';
            }
            echo '</div>
            </label>
            </div>
            </div>
            <div class="form-item">
            <input type="hidden" name="id" class="form-field-textual"
            value="'.$row['id'].'">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" name="update" value="Prihvati">
            Izmjeni</button>
            <button type="submit" name="delete" value="Izbriši">
            Izbriši</button>
            </div>
            </form>';
        }
        echo '<form method = "post">';
        echo '<button type = "submit" name = "logout">Log out</button>';
        echo '</form>';
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
















    
?>