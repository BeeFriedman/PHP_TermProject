<?php 
session_start();
$_SESSION["pageIdentifier"] = "dash"; 
include "inc/header.php"; 

if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
    echo "ERROR: Not logged in!";
    header("Refresh: 3; url = login.php");
}
else{
    echo "<h1>Hello $_COOKIE[username]</h1>";
}
?>


<?php include "inc/footer.php"; ?>
