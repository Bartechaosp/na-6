<?php
    session_start();
    if (!isset($_SESSION['email']) || !isset($_SESSION['code'])) {
        header("Location: /main/reset.html");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podaj kod weryfikacyjny</title>
</head>
<body>
    <header>
        <h1>Podaj kod weryfikacyjny</h1>
    </header>

    <main>
        <form action="/ini/reset_veryfi.ini.php" method="post">
            <input type="number" name="1" id="1" maxlength="1">
            <input type="number" name="2" id="2" maxlength="1">
            <input type="number" name="3" id="3" maxlength="1">
            <input type="number" name="4" id="4" maxlength="1">
            <input type="number" name="5" id="5" maxlength="1">
            <input type="number" name="6" id="6" maxlength="1">
            <input type="submit" value="Sprawdź">
        </form>
        <a href="/ini/reset.ini.php">Wyślij kod jeszcze raz</a>

        <?php if (isset($_SESSION['error'])){$error = $_SESSION['error'] ; echo "<p> $error </p>"; unset($_SESSION['error']); }?>

    </main>

    <footer>
        
    </footer>
</body>
</html>