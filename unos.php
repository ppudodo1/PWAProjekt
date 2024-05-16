<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post"   enctype="multipart/form-data">
        <label for="naslov">Naslov vijesti:</label>
        <br>
        <input type="text" name="naslov">
        <br>
        <label for="kratak" >Kratak sadržaj vijesti (do 50 znakova):</label>
        <br>
        <textarea name="kratak" id="" maxlength="50"></textarea>
        <br>
        <label for="sadrzaj">Sadrzaj vijesti:</label>
        <br>
        <textarea name="sadrzaj" id=""></textarea>
        <br>
        
        <input type="file" name="slika"  >
        <br>
        <label for="kategorija">Kategorija vijesti</label>
        <br>
        <input type="text" name="kategorija">
        <br>
        <label for="arhiva">Spremiti u arhivu:</label>
        <br>
        <input type="checkbox">
        <br>
        <button>Poništi</button>
        <input type="submit" 
                  name="submit"
                  value="Upload">
    </form>

    <?php
        include 'connect.php';
        
        /*if(isset($_POST['submit'] ) && isset($_FILES['slika'])){
            echo "Slikice su uspjesne";
        }else{
            echo "Slikice su neuspjesne";
        }*/
        $picture = $_FILES['slika']['name'];
        echo "Slika" . $picture;
        $title = $_POST['naslov'];
        $about = $_POST['kratak'];
        $content = $_POST['sadrzaj'];
        $category = $_POST['kategorija'];
        $date = date('d.m.Y');
        if(isset($_POST['arhiva'])){
            $arhiva = 1;
        }else{
            $arhiva = 0;
        }
        $target_dir = 'img/'.$picture;
        move_uploaded_file($_FILES['slika']['tmp_name'],$target_dir);
        $query = "INSERT INTO clanak (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$date','$title','$about','$content','$picture','$category','$arhiva')";
        $result = mysqli_query($dbc,$query) or die ('Error querying the database');
        mysqli_close($dbc);
    ?>
</body>
</html>