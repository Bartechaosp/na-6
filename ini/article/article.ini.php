<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");

    function getsth($what, $from, $id, $db) {
        if($from == "article" || $what == "tytul") { $sql = "SELECT $what FROM $from WHERE id = ?";} else $sql = "SELECT $what FROM $from WHERE article_id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    $ip = "localhost";
    $userLogin = "root";
    $userPass = "";
    $dbName = "page";
    $headings_list = [];
    $content_list = [];
    $i = 0;
    $y = 0;

    $db = mysqli_connect($ip, $userLogin, $userPass, $dbName);
    if(!$db) die("Nie udało się nawiązać połączenia z bazą danych") . mysqli_error("Nie pykło");

    if (isset($_GET['atr'])) {
        $id = $_GET['atr'];

        $resultT = getsth("tytul", "article", $id, $db);
        while ($row = mysqli_fetch_array($resultT)) { $_SESSION['title'] = $row[0]; }

        $resultP = getsth("obrazek", "article", $id, $db);
        while ($row = mysqli_fetch_array($resultP)) {$_SESSION['picture'] = $row[0];}

        $resultH = getsth("nazwa", "headings", $id, $db);
        while ($row = mysqli_fetch_array($resultH)) { $headings_list[$i] = $row[0]; $i++;}
        $_SESSION['headings'] = $headings_list; 

        $resultC = getsth("nazwa", "content", $id, $db);
        while ($row = mysqli_fetch_array($resultC)) { $content_list[$y] = $row[0]; $y++; }
        $_SESSION['contents'] = $content_list;

        mysqli_close($db);
        header("Location: /main/article.php");
        
    } else echo "Nie umiesz w get";

?>