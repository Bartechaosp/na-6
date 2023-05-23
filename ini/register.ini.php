<?php
    session_start();
    function i($thf) {if (isset($thf)){ return TRUE;} else return FALSE; }

    $ip = "localhost";
    $userLogin = "root";
    $userPass = "";
    $dbName = "page";
    $null = 0;
    $succes = 1;

    $db = mysqli_connect($ip, $userLogin, $userPass, $dbName);
    if (!$db) die("Połączenie z bazą danych nie powiodło się. Spróbuj ponownie za jakiś czas");

    if (i($_POST['username']) && i($_POST['email']) && i($_POST['age']) && i($_POST['pass']) && i($_POST['com_p']) && i($_POST['fN']) && i($_POST['lN']))
    {
        $all = [$_POST['username'], $_POST['fN'], $_POST['lN'], $_POST['age'], $_POST['pass'], $_POST['email'], $_POST['com_p']];

        for ($i = 0; $i < count($all) ;$i++) {
            if (trim($all[$i]) == "") {
                $_SESSION['error'] = "Podane wartości nie mogą być puste!";
                $null = 1;
                header("Location: /main/register.php");
                break;
            }
        }

        if ($null == 0) {

            $sql = "SELECT login, email FROM account";
            $result = mysqli_query($db, $sql);
            if (!$result) die("Dokonywanie zapytania nie powiodło się. Spróbuj ponownie później");
        
            while($row = mysqli_fetch_row($result)) {
                if ((string) $row[0] == $all[0]) {
                    echo ("Login jest już zajęty");
                    $succes = 0;
                }
                if ((string) $row[1] == $all[5]){
                 echo ("Email jest już jest zajęty");
                 $succes = 0;
                }
                if ((string) $all[4] != (string) $all[6]) {
                    echo ("Hasła się różnią!");
                    $succes = 0;
                }
            }
            if ($succes == 1) {
                $hashed_pass = password_hash($all[4],PASSWORD_BCRYPT);
                $sqlc = "INSERT INTO account VALUES(null, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($db, $sqlc);
                mysqli_stmt_bind_param($stmt, "sssiss", $all[0], $all[1], $all[2], $all[3], $hashed_pass, $all[5]);
                $result = mysqli_stmt_execute($stmt);
                if (!$result) {
                    $_SESSION['error'] = "Wystąpił problem z utworzeniem konta. Spróbuj ponownie później";
                    header("Location: /main/register.php");
                } else header("Location: /message/register_success.html");
            }
        }
    }
?>