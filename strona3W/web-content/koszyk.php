<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Powrót</a>
    <div id="koszyk">
        <?php 
            $conn = new mysqli("mysql8","01493838_mateusz", "ZAQ!2wsxZAQ!2wsx","01493838_mateusz");
            if($conn -> connect_error){
                    echo "błąd!".$conn->connect_error;
                    exit();
                }else{
                    $_SESSION['suma'] = 0;
                    $sql = "SELECT produkty.nazwa,produkty.cena,produkty.zdj
                            FROM ((koszyk
                            INNER JOIN login ON koszyk.id_usera = login.id)
                            INNER JOIN produkty ON koszyk.id_produktu = produkty.id)
                            WHERE login.id=".$_SESSION['id'];
                    $result = $conn->query($sql);
                    
                    while($final = $result->fetch_row()){
                        echo "<div style='width:400px;margin:auto; height:100px;'>";
                        echo "<span style=>".$final[0]."</span>";
                        echo "<span style='float:right;'> Cena:".$final[1]." zł</span>";
                        echo "<span style='width:200px;'><img style='width:70px;float:left;' src='".$final[2]."'></span>";
                        echo "</div>";
                        echo "<br>";
                        $_SESSION['suma'] += $final[1];
                    }
                    
                }
        ?>
    </div>
    <section style="float:right;width:250px;border:1px black solid;">
        <?php
        echo "<div>Należność wynosi: ".$_SESSION['suma']." zł</div>";
        ?>
    </section>
</body>
</html>