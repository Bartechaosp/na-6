<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");
    if (!isset($_SESSION['list']) || (!isset($_SESSION['id_list']))) {
        header("Location: /ini/article/main.ini.php");
    } else {
        $list = $_SESSION['list'];
        $id_list = $_SESSION['id_list'];
    } 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
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
        <article>
            <?php
                for ($i = 1; $i <= count($list) ;$i++) {
                    $is_odd = ($i % 2 != 0) ? $obraz = "/img/" . $list[$i] : $tytul = $list[$i];
                    if ($i <= count($id_list)) $id = $id_list[$i];
                    if ($i % 2 != 0) {echo "<figure> <a href=/ini/article/article.ini.php?atr=$id> <img src = '$obraz' alt = 'obraz'></a>";}
                    else echo "<figcaption><a href='/ini/article/article.ini.php?atr=$id/'>$tytul...</a></figcaption></figure>";
                }
                unset($_SESSION['list']);
                unset($_SESSION['id_list']);
            ?>
        </article>
    </main>

    <footer>
        <h5>Kontakt</h5>
        <p>W rzeczywistości: nr 2 w dzienniku<br>Facebook: brak</p>
    </footer>
</body>
</html>