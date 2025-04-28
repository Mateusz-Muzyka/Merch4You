<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h3><a href="login.php">Powrót</a></h3>
    <form method="POST">
        <div id="logger">
            <label for="nickname">Nazwa użytkownika</label>
            <input type="text" name="nickname" required>
            <br>
            <label for="password">Hasło</label>
            <input type="password" name="password" required>
            <br>
            <label for="password">Powtórz hasło</label>
            <input type="password" name="password2" required>
            <br>
            <button id="login2" value="true" name="login-button">Zarejestuj się</button>
        </div>
        </form>


<?php
    $conn = new mysqli("localhost","root", "", "3w");

    if($conn -> connect_error){
        echo "błąd".$conn->connect_error;
        exit();
    }

    if(isset($_POST['login-button']))
        if($_POST['login-button'] == true){
            if($_POST['password'] == $_POST['password2']){
                $querry = "SELECT * FROM login WHERE nickname = '".$_POST['nickname']."'";
                $result = $conn -> query($querry);
                $final = $result -> fetch_row();
                if($final != ""){
                    echo "użytkownik o takiej nazwie istnieje";
                    exit();
                }else{
                    $nick = $_POST['nickname'];
                    $pass = $_POST['password'];
                    $TEMP_data = "INSERT INTO login (nickname, password) VALUES('".$nick."','".$pass."')";
                    $querry = $TEMP_data;
                    if($conn -> query($querry)){
                        echo "zarejestrowano";
                        header('Location: login.php');
                    }
                    
                }
            }
        }
?>