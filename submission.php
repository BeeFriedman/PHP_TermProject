<?php
    session_start();
    $pageIdentifier = "submission";
    include "Inc/header.php";
    
    $conn = mysqli_connect("localhost", "root", "BForceat566", "manageschool");
    $query = "SELECT username FROM authorizedusers WHERE username='$_POST[username]' AND password='$_POST[password]'";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_assoc($result);

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
    include 'Inc/footer.php';
?>

