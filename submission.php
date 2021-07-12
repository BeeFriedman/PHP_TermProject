<?php
    session_start();
    if($_SESSION["pageIdentifier"] == "login"){
        $_SESSION["pageIdentifier"] = "submission";
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
    }
    else{
        $_SESSION["pageIdentifier"] = "submission";
        require "config/db.php";
        include "inc/header.php";
        $is_admin = "no";

        if($_POST["type"] == "Admin"){
            $is_admin = "yes";
        }

        $query = "INSERT INTO authorizedusers (username, password, admin) values
        ('$_POST[username]', '$_POST[password]', '$is_admin');";
        $result= mysqli_query($conn, $query);
        print_r(mysqli_error($conn));
        $query = "SELECT id FROM authorizedusers WHERE username='$_POST[username]';";
        $result = mysqli_query($conn, $query);
        $posts = mysqli_fetch_assoc($result);
        print_r(mysqli_error($conn));
        print_r($posts);
        $id = $posts["id"];

        $query = "INSERT INTO students (user_id, first_name, last_name, phonenumber) values
                 ($id, '$_POST[first]', '$_POST[last]', '$_POST[phone]');";
        $result = mysqli_query($conn, $query);
        print_r(mysqli_error($conn));
    }

    include 'inc/footer.php';
?>

