<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zresetuj hasło</title>
</head>
<body>
    <header>
        <h1>Najważniejsze newsy w jednym miejscu!</h1>
    </header>

    <main>
        <form action="/ini/reset.ini.php" method="post">
            <legend>Zresetuj hasło</legend>
            <label for="email">Podaj swój email: </label>
            <input type="email" name="email" id="email">
            <input type="submit" value="Wyślij zapytanie">
        </form>

        <?php if (isset($_SESSION['error'])){$error = $_SESSION['error'] ; echo "<p> $error </p>"; unset($_SESSION['error']); }?>

    </main>

    <footer>
        <h5>Kontakt</h5>
        <p>W rzeczywistości: nr 2 w dzienniku<br>Facebook: brak</p>
    </footer>
</body>
</html>