<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merch4You</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container-inner">
            <span>
                Merch4You
            </span>
            <span>
                <ul>
                    <li>CATALOG</li>
                </ul>
            </span>
            <span>
                <ul>
                    <li><a href="catalog-products.php">COLLECTION</a></li>
                </ul>
            </span>
            <span>
                <ul>
                    <li>MORE</li>
                </ul>
            </span>
            <?php
            echo $_SESSION['nazwa'];
            echo $_SESSION['zalogowany'];
            
            if($_SESSION['zalogowany'] == true){
            echo '
            <span id="login">
                Witaj '.$_SESSION['nazwa'].'
            </span>';
        }else{
            echo '
            <span id="login">
                <a href="login.php">LOGIN</a>
            </span>';
        }
            ?>
            <span><input type="text" value="Search"> </span>
        </div>
    </header>
    <main>
        <div id="new-products">
            <img src="images/new-product-banner.webp" alt="New Products">
            <h2>BLOODBORNE</h2>
        </div>
    </main>
</body>
</html>