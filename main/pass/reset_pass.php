<?php 
    session_start();

    if (!isset($_SESSION['email']) || !isset($_SESSION['code'])) {
        header("Location: /main/pass/reset.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wprowadź nowe hasło</title>
</head>
<body>
    <header>
        <h1>Podaj nowe hasło</h1>
    </header>

    <main>
        <form action="/ini/passchange.ini.php" method="post">
            <label for="new_pass">Nowe hasło: </label>
            <input type="password" name="new_pass" id="new_pass">
            <label for="com_pass">Powtórz hasło: </label>
            <input type="password" name="com_pass" id="com_pass">
            <input type="submit" value="Zmień hasło">
        </form>

        <?php if (isset($_SESSION['error'])){$error = $_SESSION['error'] ; echo "<p> $error </p>"; unset($_SESSION['error']); }?>
    </main>

    <footer>

    </footer>
</body>
</html>