<?php 
    session_start();

    if (isset($_SESSION['login'])) {
        unset($_SESSION['login']);
        unset($_SESSION['list']);
        unset($_SESSION['name']);
        header("Location: /main/login.php");
    } else header("Location: /main/login.php");
?>