<?php
    session_start();
    var_dump($_SESSION);
    $pass_correct = 1;
    function pass_correct($conditional,$message, $pass_correct) {
        if ($conditional) {
        $pass_correct = 0;
        echo $pass_correct;
        }
    }
    pass_correct($con = ('1' != '2'), "Elowina", $pass_correct);
    // unset($_SESSION['list']);
    echo $pass_correct;
?>