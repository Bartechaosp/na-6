<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");

    if (isset($_SESSION['title']) || isset($_SESSION['headings']) || isset($_SESSION['contents'])) {
        $title = $_SESSION['title'];
        $picture = $_SESSION['picture'];
        $content_array = $_SESSION['contents'];
        $headings_array = $_SESSION['headings'];
    } else header("Location: /main/main.php");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title> $title </title>"?>
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
        <?php
         echo "<h2> $title </h2>";
         echo "<figure> <img src=/img/" . $picture . " alt='Zdjęcie ilustrujące tytuł artykułu'" . "</figure>"; 
         for ($i = 0; $i < count($content_array) ;$i++) {
            if ($i < count($headings_array)) echo "<h3>" . $headings_array[$i] . "</h3>";
            echo "<p>" . $content_array[$i] . "</p>";
         } 
         unset($_SESSION['title']);
         unset($_SESSION['picture']);
         unset($_SESSION['contents']);
         unset($_SESSION['headings']);
         ?>
        
    </main>

    <footer>
        <h5>Kontakt</h5>
        <p>W rzeczywistości: nr 2 w dzienniku<br>Facebook: brak</p>
    </footer>
</body>
</html>