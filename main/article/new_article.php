<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");
    if (!isset($_SESSION['number'])) header("Location: /main/article/info_new.php");
    if(isset($_SESSION['number'])) {
        $number = $_SESSION['number'];
        $number_last = $number + 1;
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/new_article.css">
    <title>Nowy artykuł</title>
</head>
<body>
    <header>
        <h1>Najważniejsze newsy w jednym miejscu!</h1>
        <nav>
            <ul>
                <li><a href="/main/main.php">strona główna</a></li>
                <li><a href="/main/my_article.php">twoje artykuły</a></li>
                <li><a href="/main/account.html">twoje konto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Podziel się twórczością!</h2>

        <form action="/main/article/info_new.php" method="post">
            
            <?php
                for ($i = 1; $i <= $number ;$i++) {
                    echo "<ul>
                        <li>
                            <label for='heading$i'>Nagłówek $i: </label>
                            <input type='text' name='heading' id='heading$i/>'
                        </li>
                        <li>
                            <label for='content$i'>Akapit $i: </label>
                            <textarea class='content' type='textarea' name='content' id='content$i' rows='3' cols='25'></textarea>
                        </li>
                    </ul>";
                }
                echo "<button type='submit'>Pokaż swoje dzieło!</button>";
            ?>
        </form>
        <?php 
            if(isset($_SESSION['error'])) {
                $error = $_SESSION['error'];
                echo "<p> $error </p>";
                unset($_SESSION['error']);
            }
        ?>
    </main>

    <footer>
        <h5>Kontakt</h5>
        <p>W rzeczywistości: nr 2 w dzienniku<br>Facebook: brak</p>
    </footer>
</body>
</html>