<?php 
    session_start();
    if (!isset($_SESSION['login'])) header("Location: /main/login.php");

    if (isset($_POST['number'])) {

        if ($_POST['number'] > 10 || $_POST['number'] < 0) {
            $_SESSION['error'] = "Maksymalnie 10 nagłówków!";
            header("Location: /main/article/info_new.php");
        } else {
            $_SESSION['number'] = $_POST['number'];
            header("Location: /main/article/new_article.php");
        }
    } echo "Nie ma posta";

?>