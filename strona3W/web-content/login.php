<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h3><a href="index.php">Powrót</a></h3>
    <form method="POST">
        <div id="logger">
            <label for="nickname">Nazwa użytkownika</label>
            <input type="text" name="nickname" required>
            <br>
            <label for="password">Hasło</label>
            <input type="password" name="password" required>
            <br>
            <button id="login" value="true" name="login-button">Zaloguj sie</button>
            <p>brak konta? możesz je stworzyć za darmo <a href="register.php">tutaj</a></p>
        </div>
        </form>

        
        
    <?php 
        $conn = new mysqli("mysql8","01493838_mateusz", "ZAQ!2wsxZAQ!2wsx","01493838_mateusz");
        if($conn -> connect_error){
            echo "błąd!".$conn->connect_error;
            exit();
        }
        if(isset($_POST['login-button'])){
            if($_POST['login-button'] == true){
                $temp_helper = "SELECT * FROM login WHERE nickname = '".$_POST['nickname']."' AND password = '".$_POST['password']."'";   
                $querry = $temp_helper;
                $result = $conn -> query($querry);
                $final = $result->fetch_row();
                if($final != ""){
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['id'] = $final[0];
                    $_SESSION['nazwa'] = $final[1];
                    if($final[3] == true){
                        $_SESSION['admin'] = true;
                    }
                    
                }else{
                    echo "błędne poświadczenia";
                    
                }
            }
        } 
    ?>
</body>
</html>