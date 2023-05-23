<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");

    if (isset($_SESSION['my_id']) && isset($_SESSION['my_title']) && isset($_SESSION['my_picture'])) {
        $title = $_SESSION['my_title'];
        $picture = $_SESSION['my_picture'];
        $id = $_SESSION['my_id'];
    } else if (!isset($_SESSION['error'])) {
        header("Location: /ini/article/my_article.ini.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje artykuły</title>
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
        <img src="/img/add.png" alt="dodaj artykuł">
        
        <?php
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            echo "<p>" . $error . "</p>";
            unset($_SESSION['error']);
        }
        else {
            for ($i = 0; $i < count($_SESSION['my_id']) ;$i++) {
                $id = $id[$i];
                $title = $title[$i];
                echo "<ul>
                <li> <figure> <a href='/ini/article/article.ini.php?atr=$id'/> $title </a> </figure> </li>
                </ul>";
            }
        }
        unset($_SESSION['my_id']);
        unset($_SESSION['my_title']);
        unset($_SESSION['my_picture']);
        ?>

    </main>

    <footer>
        <h5>Kontakt</h5>
        <p>W rzeczywistości: nr 2 w dzienniku<br>Facebook: brak</p>
    </footer>
</body>
</html>