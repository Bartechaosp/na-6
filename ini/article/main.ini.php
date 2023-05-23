<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");
    
    $list = [];
    $id_list = [];
    $i = 1;
    $y = 1;
    $db = mysqli_connect("localhost", "root", "", "page");
    if (!$db) die("Nie udało się nawiązać połączenia z bazą danych. Spróbuj ponownie za chwilę") . "Nie udało się połączyć z bazą danych";
    $sql = "SELECT obrazek, tytul FROM article";
    $result = mysqli_query($db, $sql);
    if (!$result) die("Nie udało się dokonać zapytania. Spróbuj ponownie za chwilę");
    $sqlc = "SELECT id FROM article";
    $resultc = mysqli_query($db, $sqlc);
    if (!$resultc) die("Nie udało się dokonać zapytania. Spróbuj ponownie za chwilę");


    while ($row = mysqli_fetch_row($result)) {
        $list[$i] = $row[0];
        $i++;
        $list[$i] = $row[1];
    }

    while ($row = mysqli_fetch_row($resultc)) {
        $id_list[$y] = $row[0];
        $y++;
    }

    $_SESSION['list'] = $list;
    $_SESSION['id_list'] = $id_list;
    mysqli_close($db);
    header("Location: /main/main.php");
?>