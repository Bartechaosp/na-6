<?php
    session_start();

    $userCode = [$_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6']];
    $email = $_SESSION['email'];
    $code = $_SESSION['code'];
    $count = 0;
    $null = 0;

    for ($i = 0; $i < count($userCode) ;$i++) {
        if (trim($userCode[$i]) == "") {
            $null = 1;
            $_SESSION['error'] = "Proszę wpisać kod!";
            header("Location: /main/pass/reset_check_code.php");
            break;
        }
    }
    
    if ($null == 0) {

    for ($i = 0; $i< count($code) ;$i++) {
        if ($userCode[$i] == $code[$i]) {
            $count++;
        }
    }

    if ($count != 6) {
        $_SESSION['error'] = "Podany kod jest nieprawidłowy";
        header("Location: /main/pass/reset_check_code.php");
    }

    if ($count == 6) {
        header("Location: /main/pass/reset_pass.php");
    }
}
?>