<?php 
    session_start();
    $ip = "localhost";
    $loginUser = "root";
    $userPass = "";
    $dbName = "page";
    $null = 0;
    $pass_count = 0;
    $id = 0;

    function pass_correct($conditional,$message) {
        if ($conditional) {
        $_SESSION['error'] = $message;
        header("Location: /main/pass/reset_pass.php");
        }
    }

    if (isset($_POST['new_pass']) && isset($_POST['com_pass']) && isset($_SESSION['email'])) {
        $new_pass = $_POST['new_pass'];
        $com_pass = $_POST['com_pass'];
        $email = $_SESSION['email'];

        if (trim($new_pass) == "" || trim($com_pass) == "") {
            $_SESSION['error'] = "Proszę wpisać hasło!";
            header("Location: /main/pass/reset_pass.php");
        }

        for ($i = 0; $i < strlen($new_pass) ;$i++) {
            if (is_numeric($new_pass[$i])) $pass_count++;
        }

        pass_correct($pass_count < 3, "Hasło musi zawierać minimum 3 cyfry!");
        pass_correct(strlen($new_pass) < 8, "Hasło musi zawierać minimum 8 znaków!");
        pass_correct($new_pass != $com_pass, "Hasła się różnią");

        if (!isset($_SESSION['error'])) {

        $db = mysqli_connect($ip, $loginUser, $userPass, $dbName);
        if (!$db) die("Połaczenie z bazą danych nie powiodło się") . mysqli_error($db);

        $hashed_pass = password_hash($new_pass, PASSWORD_BCRYPT);

        $sql = "SELECT id from account WHERE email = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_close($stmt);

        $sqlc = "UPDATE account SET pass = '$hashed_pass' WHERE id = $id";
        $result = mysqli_query($db, $sqlc);

        while($row = mysqli_fetch_row($result)) {
            unset($_SESSION['email']);
            unset($_SESSION['code']);
            header("Location: /message/reset_success.html");
        }
    }
    }
?>