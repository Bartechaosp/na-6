<?php 
    session_start();
    if (password_verify("Lukaszek1234",'$10$49nhE.ORiBH3uU22ucXU7.lIYnIEOQa5VtsG10xLDju')) echo "działa";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
</head>
<body>
    <header>
        <h1>Najważniejsze newsy w jednym miejscu!</h1>
    </header>

    <main>
        <h2>Zaloguj się</h2>
        <form action="/ini/login.ini.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="pass">Hasło: </label>
            <input type="password" name="pass" id="pass">
            <input type="submit" value="Zaloguj się">
        </form>
        <footer>
            <p>Nie masz konta? <a href="/main/register.php">zarejestruj się!</a></p>
            <p>Nie pamiętasz hasła? <a href="/main/pass/reset.php">Zresetuj je</a></p>
        </footer>

        <?php if (isset($_SESSION['error'])){$error = $_SESSION['error'] ; echo "<p> $error </p>"; unset($_SESSION['error']); }?>
    </main>

    <footer>
        <p>kontakt: 2 nr w dzienniku 4FI</p>
    </footer>
</body>
</html>