<?php
    session_start();
    $pageIdentifier = "submission";
    $username = ["Barry", "Alex", "Leah"];
    $password = ["Barry" => "12345abc", "Alex" => "runlong", "Leah" => "2021where"];
    include "header.php";
    
    foreach($username as $user){
        if($_POST["username"] === $user){
            if($_POST["password"] === $password[$user]){
                echo "<a href='index.php'>Dashboard</a>";
                setcookie("username", $user);
                $_SESSION["loggedin"] = TRUE;
            }
        }
    }
    if(!$_SESSION["loggedin"] == TRUE){
        $_SESSION["loggedin"] = FALSE;
    }
    include 'footer.php';
?>

