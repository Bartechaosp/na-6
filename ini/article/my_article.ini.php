<?php 
    session_start();
    if (!isset($_SESSION['login']) || !isset($_SESSION['name'])) header("Location: /main/login.php");

    function getsth($what, $autor, $db) {  
            $sql = "SELECT $what FROM article WHERE autor = ?";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "s", $autor);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 0) { return null; }
            else return $result;
    }

    $ip = "localhost";
    $userName = "root";
    $userPass = "";
    $dbName = "page";

    $db = mysqli_connect($ip, $userName, $userPass, $dbName);
    if (!$db) die("Nie udało się połączyć z bazą danych. Proszę spróbować później.") . mysqli_connect_error("Nie pykło");

    if (isset($_SESSION['name'])) {
        $login = $_SESSION['name'];
        $id_array = [];
        $title_array = [];
        $picture_array = [];
        $i = 0;
        
        $resultID = getsth("id", $login, $db);
        if ($resultID) {
            while($row = mysqli_fetch_array($resultID)) { $id_array[$i] = $row[0]; $i++; }
            $_SESSION['my_id'] = $id_array;
            $i = 0;

            $resultT = getsth("tytul", $login, $db);
            while ($row = mysqli_fetch_array($resultT)) { $title_array[$i] = $row[0]; $i++; }
            $_SESSION['my_title'] = $title_array;
            $i = 0;

            $resultP = getsth("obrazek", $login, $db);
            while ($row = mysqli_fetch_array($resultP)) { $picture_array[$i] = $row[0]; $i++; }
            $_SESSION['my_picture'] = $picture_array;

            header("Location: /main/my_article.php");
        } else {
            $_SESSION['error'] = "Nie masz jeszcze żadnych artykułów.<a href='/main/article/info_new.php'>Utwórz je!</a>"; 
            header("Location: /main/my_article.php");
        }
        mysqli_close($db);
        }

?>