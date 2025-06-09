<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="catalog-products.php">Powrót</a>
    <?php
        $id = $_SERVER['QUERY_STRING'];
        $l = strlen($id);
        $id = substr($id,$l-1);
        $conn = new mysqli("mysql8","01493838_mateusz", "ZAQ!2wsxZAQ!2wsx","01493838_mateusz");
                if($conn -> connect_error){
                    echo "błąd!".$conn->connect_error;
                    exit();
                }else{
                    $sql = "SELECT * FROM produkty WHERE id=".$id;
                    $result = $conn -> query($sql);
                    while($row = $result->fetch_row()){
                        echo "<div class='product'>";
                        echo "<h3>".$row[1]."</h3>";
                        echo "<p>".$row[2]."</p>";
                        echo "<p>Cena: ".$row[3]." zł</p>";
                        echo "<img class='obrazek' style='width:400px;' src='".$row[5]."'>";
                        echo "<br>";
                        echo "<hr>";
                        echo "<hr>";
                        echo "<button>Dodaj do koszyka</button>";
                        echo "</div>";
                    } 
                }
    ?>
</body>
</html>