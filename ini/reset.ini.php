<?php
    session_start();
    $email = $_POST['email'];
    $null = 0;

    if (trim($email) == "") {
        $null = 1;
        $_SESSION['error'] = "Proszę podać swój email!";
        header("Location: /main/pass/reset.php");
    }

    if ($null == 0){

        $_SESSION['email'] = $email;
        $list = array();
        for($i = 0; $i < 6 ;$i++) {
            $list[$i] = rand(0,9);
        }
    
        $_SESSION['code'] = $list;
        
        $elo = mail($email,"Zmiana hasła", "Kod: " . implode("", $list) );

        if ($elo) {
            header("Location: /main/pass/reset_check_code.php");
        } else echo "nie działa";
        }
?>