<?php
    session_start();
    $pageIdentifier = "submission";
    require "config/db.php";
    include "inc/header.php";
    
    $query = "SELECT id, username FROM authorizedusers WHERE username='$_POST[username]' AND password='$_POST[password]'";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_assoc($result);
    $_SESSION["student_id"] = $posts["id"];

    if(mysqli_num_rows($result) == 1){
        echo "<a href='index.php'>Dashboard</a>";
        setcookie("username", $posts['username']);
        $_SESSION["loggedin"] = TRUE;       
    }
    else{
       $_SESSION["loggedin"] = False; 
       echo 'Invalid username or password!';
       header("Refresh: 3; url = login.php");
    }
    include 'inc/footer.php';
?>

