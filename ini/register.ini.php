<?php
    session_start();

    //get variable from register form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $pass = $_POST['pass'];
    $com_pass = $_POST['com_pass'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $all = [$username, $email, $age, $pass, $com_pass, $firstName, $lastName];
    $null = 0;
    $succes = 1;

    //check if variables is empty
    for ($i = 0; $i < count($all) ;$i++) {
        if (trim($all[$i]) == "") {
            $_SESSION['error'] = "Podane wartości nie mogą być puste!";
            $null = 1;
            header("Location: /main/register.php");
            break;
        }
    }

    if ($null == 0) {
    //make connection with db
    $db = mysqli_connect("localhost", "root", "", "page");
    if (!$db) die("Połączenie z bazą danych nie powiodło się. Spróbuj ponownie za jakiś czas");

    //make query and check if account is exist jet or if pass and com_pass is the same
    $sql = "SELECT login, email FROM account";
    $result = mysqli_query($db, $sql);
    if (!$result) die("Dokonywanie zapytania nie powiodło się. Spróbuj ponownie później");

    while($row = mysqli_fetch_row($result)) {
        if ($row[0] == $username) {
            echo ("Login jest już zajęty");
            $succes = 0;
        }
        if ($row[1] == $email){
         echo ("Email jest już jest zajęty");
         $succes = 0;
        }
        if ($pass != $com_pass) {
            echo ("Hasła się różnią!");
            $succes = 0;
        }
    }
    //
    if ($succes == 1) {
        $hashed_pass = password_hash($pass,PASSWORD_BCRYPT);
        $sqlc = "INSERT INTO account VALUES(id,'$username', '$firstName', '$lastName', '$age', $hashed_pass, '$email')";
        $resultc = mysqli_query($db, $sqlc);
        if (!$resultc) die("Nie udało się stworzyć konta. Spróbuj ponownie później.");
        if ($result) header("Location: /message/register_succes.html");
    }
}
?>