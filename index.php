<?php 
    session_start();

    if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
        header("Location: login.php");
    }
    else{
        include "inc/header.php"; 
        echo "<h1>Hello $_COOKIE[username]</h1>";
    }

    include "inc/footer.php"; 
?>
