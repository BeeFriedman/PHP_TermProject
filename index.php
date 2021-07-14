<?php 
    session_start();
    $_SESSION["page_identifier"] = "dash"; 
    include "inc/header.php"; 

    if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
        header("Location: login.php");
    }
    else{
        echo "<h1>Hello $_COOKIE[username]</h1>";
    }

    include "inc/footer.php"; 
?>
