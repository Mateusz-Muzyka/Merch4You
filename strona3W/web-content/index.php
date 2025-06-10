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
            if($_SESSION['zalogowany'] == true){
            echo '
            <span>
                Witaj '.$_SESSION['nazwa'].'
            </span>';
            echo '
            <span id="login">
                <form method="POST">
                    <button id="button" name="logout" value="true">WYLOGUJ</button>
                </form>
            </span>';
            if($_SESSION['admin'] == true){
                echo '
                <span id="edycja">
                    <a href="edycja.php" style="color:red;">Edycja</a>
                </span>';               
            }
        }else{
            echo '
            <span id="login">
                <a href="login.php">LOGIN</a>
            </span>';
        }
            ?>
            <span><input type="text" value="Search"> </span>
            <span><a href="koszyk.php">Koszyk</a></span>

        </div>
    </header>
    <main>
        <div id="new-products">
            <img src="images/new-product-banner.webp" alt="New Products">
            <h2>BLOODBORNE</h2>
        </div>
    </main>
    <?php
        if(isset($_POST['logout'])){
            if($_POST['logout'] == true){
                $_SESSION['zalogowany'] = false;
                $_SESSION['nazwa'] = null;
            }
        }
    ?>
<script>
    q = document.getElementById('button');
    q.addEventListener("click",rew);

    function rew(){
        console.log("działa")

    }
</script>
</body>
</html>