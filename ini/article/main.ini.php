<?php 
    session_start();
    $list = [];
    $i = 1;
    $db = mysqli_connect("localhost", "root", "", "page");
    if (!$db) die("Nie udało się nawiązać połączenia z bazą danych. Spróbuj ponownie za chwilę");
    $sql = "SELECT obrazek, tytul FROM article";
    $result = mysqli_query($db, $sql);
    if (!$result) die("Nie udało się dokonać zapytania. Spróbuj ponownie za chwilę");

    while ($row = mysqli_fetch_row($result)) {
        $list[$i] = $row[0];
        $i++;
        $list[$i] = $row[1];
    }

    $_SESSION['list'] = $list;
    header("Location: /main/main.php");
?>