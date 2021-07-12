<?php 
$pageIdentifier = "dash"; 
include "inc/header.php"; 
session_start();

if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
    echo "ERROR: Not logged in!";
    header("Refresh: 3; url = login.php");
}
else{
    echo "<h1>Hello $_COOKIE[username]</h1>
          <h2>Courses that you are currently enrolled in.</h2>
            <ol>
                <li>Writing I</li>
                <li>Intro Econ</li>
                <li>College Math</li>
            </ol>";
}
?>


<?php include "inc/footer.php"; ?>
