<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Powrót</a>
    <form method="POST">
        <label for='nazwa'>Podaj nazwe produktu: </label>
        <input type='text' name='nazwa' require>
        <br>
        <label for='opis'>Podaj opis produktu: </label>
        <input type='text' name='opis' require>    
        <br>
        <label for='cena'>Podaj cene produktu: </label>
        <input type='number' name='cena' require>
        <br>


        <label for='typ'>Podaj typ produktu: </label>
        <select name="typ" require>
          <option value="pluszak">pluszak</option>
          <option value="figurka">figurka</option>
          <option value="akcesoria">akcesoria</option>
          <option value="inne">inne</option>
        </select>
        <br>
        <label for='zdj'>Podaj sciezke do zdj: </label>
        <input type='text' name='zdj'>
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <button name="submit" value="true">wyślij</button>
    </form>

    <?php
        if(isset($_POST['submit'])){
            if($_POST['submit'] == true){
                $conn = new mysqli("mysql8","01493838_mateusz", "ZAQ!2wsxZAQ!2wsx","01493838_mateusz");
                if($conn -> connect_error){
                    echo "błąd!".$conn->connect_error;
                    exit();
                }else{
                    $sql = "INSERT INTO produkty (nazwa,opis,cena,typ,zdj) VALUES('".$_POST['nazwa']."','".$_POST['opis']."',".$_POST['cena'].",'".$_POST['typ']."','".$_POST['zdj']."')";
                    $conn->query($sql);

                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                    if(isset($_POST["submit"])) {
                      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                      if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                      } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                      }
                    }
                }
            }
        }
    ?>
</body>
</html>