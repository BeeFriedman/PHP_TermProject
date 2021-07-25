<?php 
    session_start();

    if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
        header("Location: login.php");
    }
    else{
        include "inc/header.php"; 
    }
?>
    <div class="backgroundImage"></div>
    <h2 class="caption">The future is now</h2>
<?php
    include "inc/footer.php"; 
?>
