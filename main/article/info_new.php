<?php
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="/ini/article/info_new.ini.php" method="post">
            <fieldset>
                <legend>Wielkość artykułu</legend>
                <input type="number" name="number" id="number">
                <button type="submit">Do dzieła!</button>
            </fieldset>
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>