<?php 
    session_start();

    $ip = "localhost";
    $loginUser = "root";
    $userPass = "";
    $dbName = "page";
    $count = 0;
    //db connect
    $db = mysqli_connect($ip, $loginUser, $userPass, $dbName);
    if (!$db) die("Nie udało się połączyć z bazą danych. Spróbuj ponownie później") . mysqli_error($db);
    //chceck if posts are empty
    if (isset($_POST['email']) && isset($_POST['pass']) && (is_string($_POST['email']) && is_string($_POST['pass']))) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(trim($email) == "" || trim($pass) == "") {
            $_SESSION['error'] = "Pola nie mogą być puste";
            mysqli_close($db);
            header("Location: /main/login.php");
        }

        $sql = "SELECT email, pass, login FROM account";
        $result = mysqli_query($db, $sql);
        if (!$result) die("Nie udało się wykonać zapytania. Spróbuj ponownie później") . mysqli_error($result);
        
        while($row = mysqli_fetch_row($result)) {
                if ($email == $row[0] && password_verify($pass, $row[1])) {
                    $count = 1;
                    $login = $row[2];
                }
            }

            if ($count != 1) {
                $_SESSION['error'] = "Hasło lub emali są nieprawidłowe";
                mysqli_free_result($result);
                mysqli_close($db);
                header("Location: /main/login.php");
            } else {
                $_SESSION['login'] = True;
                $_SESSION['name'] = $login;
                mysqli_free_result($result);
                mysqli_close($db);
                header("Location: /main/main.php");
            }
        }
?>