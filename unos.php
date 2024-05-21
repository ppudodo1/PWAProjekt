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
            <a href="administracija.php" class="redirectLink">Administracija</a>
        </nav>
    </header>
    <hr>

    <form method="post" enctype="multipart/form-data" id="myForm">
        <p id="porukaTitle"></p>
        <label for="naslov">Naslov vijesti:</label>
        <br>
        <input type="text" name="naslov" id="title">
        <br>
        <label for="kratak">Kratak sadržaj vijesti (do 50 znakova):</label>
        <br>
        <p id="porukaSadrzaj"></p>
        <textarea name="kratak" id="shContext" maxlength="50"></textarea>
        <br>
        <label for="sadrzaj">Sadrzaj vijesti:</label>
        <br>
        <p id="porukaTekst"></p>
        <textarea name="sadrzaj" id="tekst"></textarea>
        <br>
        <p id="porukaSlika"></p>
        <input type="file" name="slika" id="photo">
        <br>
        <label for="kategorija">Kategorija vijesti</label>
        <br>
        <p id="porukaKategorija"></p>
        <input type="text" name="kategorija" id="kategorija">
        <br>
        <label for="arhiva">Spremiti u arhivu:</label>
        <br>
        
        <input type="checkbox" name="arhiva" id="arhiva">
        <br>
        <button type="button" onclick="resetForm()">Poništi</button>
        <input type="submit" name="submit" value="Upload" id="slanje">
    </form>

    <script>
        document.getElementById("myForm").onsubmit = function(event) {
            let slanjeForme = true;
           
            
            //naslov
            let poljeTitle = document.getElementById('title');
            let title = document.getElementById('title').value;
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border = "1px dashed red";
                document.getElementById("porukaTitle").innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova! <br>";
            } else {
                poljeTitle.style.border = "1px solid green";
                document.getElementById("porukaTitle").innerHTML = "";
            }
            //kratak sadrzaj
            let poljeSadrzaj = document.getElementById('shContext');
            let sadrzaj = document.getElementById('shContext').value;
            if(sadrzaj.length<10 || sadrzaj.length>100){
                slanjeForme=false;
                poljeSadrzaj.style.border = "1px dashed red";
                document.getElementById("porukaSadrzaj").innerHTML = "Kratak sadrzaj mora imati između 10 i 100 znakova! <br>";
            }else{
                poljeSadrzaj.style.border = "1px solid green";
                document.getElementById("porukaSadrzaj").innerHTML = "";
            }
          

            //puni tekst
            let poljeTekst = document.getElementById('tekst');
            let tekst = document.getElementById('tekst').value;
            if(tekst.length==0){
                slanjeForme=false;
                poljeTekst.style.border = "1px dashed red";
                document.getElementById("porukaTekst").innerHTML = "Tekst mora biti unesen <br>";
            }else{
                poljeTekst.style.border = "1px solid green";
                document.getElementById("porukaTekst").innerHTML = "";
            }

            //slika
            let poljeSlika = document.getElementById('photo');
            let slika = document.getElementById('photo').value;
            if(slika.length==0){
                slanjeForme=false;
                poljeSlika.style.border = "1px dashed red";
                document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena <br>";
            }else{
                poljeSlika.style.border = "1px solid green";
                document.getElementById("porukaSlika").innerHTML = "";
            }

            //Kategorija
            let poljeKategorija = document.getElementById('kategorija');
            let kategorija = document.getElementById('kategorija').value;
            if(slika.length==0){
                slanjeForme=false;
                poljeKategorija.style.border = "1px dashed red";
                document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana <br>";
            }else{
                poljeSlika.style.border = "1px solid green";
                document.getElementById("porukaKategorija").innerHTML = "";
            }
       

            if (!slanjeForme) {
                event.preventDefault();
            }
        };

        function resetForm() {
            document.getElementById("myForm").reset();
            document.getElementById('title').style.border = "";
            document.getElementById("porukaTitle").innerHTML = "";
        }
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && isset($_FILES['slika'])) {
        include 'connect.php';

        $picture = $_FILES['slika']['name'];
        $title = $_POST['naslov'];
        $about = $_POST['kratak'];
        $content = $_POST['sadrzaj'];
        $category = $_POST['kategorija'];
        $date = date('d.m.Y');

        $arhiva = isset($_POST['arhiva']) ? 1 : 0;

        $target_dir = 'img/' . $picture;
        move_uploaded_file($_FILES['slika']['tmp_name'], $target_dir);

        $query = "INSERT INTO clanak (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$arhiva')";
        $result = mysqli_query($dbc, $query) or die('Error querying the database');

        mysqli_close($dbc);
    }
    ?>
</body>
</html>
