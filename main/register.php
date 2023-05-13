<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zajerestruj się</title>
</head>
<body>
    <header>
        <h1>Najważniejsze newsy w jednym miejscu!</h1>
    </header>

    <main>
        <form action="/ini/register.ini.php" method="post">
            <legend>Zajerestruj się</legend>

            <label for="username">Login: </label>
            <input type="text" name="username" id="username">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <label for="firstName">Imie: </label>
            <input type="text" name="firstName" id="firstName">
            <label for="lastName">Nazwisko: </label>
            <input type="text" name="lastName" id="lastName">
            <label for="age">Wiek: </label>
            <input type="number" name="age" id="age">
            <label for="pass">Hasło: </label>
            <input type="password" name="pass" id="pass">
            <label for="com_pass">Powtórz hasło: </label>
            <input type="password" name="com_pass" id="com_pass">
            <input type="submit" value="Zarejestruj się">
        </form>

        <?php if (isset($_SESSION['error'])){$error = $_SESSION['error'] ; echo "<p> $error </p>"; unset($_SESSION['error']); }?>

    </main>

    <footer>
        <h5>Kontakt</h5>
        <p>W rzeczywistości: nr 2 w dzienniku<br>Facebook: brak</p>
    </footer>
</body>
</html>