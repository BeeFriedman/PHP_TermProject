<?php
    session_start();
    $_SESSION["page_identifier"] = "submission";

    //checking if the form is a login in form or a new user form.
    if($_POST["form_type"] == "login"){
        require "config/db.php";
        include "inc/header.php";
        
        $validate_user_query = "SELECT id, username FROM authorizedusers WHERE username='$_POST[username]' AND password='$_POST[password]'";
        $raw_user_validation_result = mysqli_query($conn, $validate_user_query);
        $user_validation_result_array = mysqli_fetch_assoc($raw_user_validation_result);

        //checks if the database verified the user, if true then it sets the 
        // session loggedin to true then it sets the student_id and a cookie 
        // then redirects to index.php, else it redirects to login.php.
        if(mysqli_num_rows($raw_user_validation_result) == 1){
            setcookie("username", $user_validation_result_array["username"]);
            $_SESSION["loggedin"] = TRUE;
            header("Location: index.php");       
        }
        else{
           $_SESSION["loggedin"] = False; 
           echo "<h2>Invalid username or password!</h2>";
           header("Refresh: 3; url = login.php");
        }
    }
    else{
        require "config/db.php";
        include "inc/header.php";
        $is_admin = "User";

        if($_POST["type"] == "Admin"){
            $is_admin = "Admin";
        }

        $check_login_query = "SELECT username FROM authorizedusers WHERE username='$_POST[username]'";
        $raw_login_check_results = mysqli_query($conn, $check_login_query);

        $check_user_query = "SELECT first_name FROM students WHERE first_name='$_POST[first]' AND last_name='$_POST[last]'";
        $raw_user_check_results = mysqli_query($conn, $check_user_query);
        
        //checks if user already exsits, if it doesn't then checks if username is already taken.
        //if it passes all checks, then it inserts the new user in the database.
        if(mysqli_num_rows($raw_user_check_results) == 1){
            echo "<h2>You are already registered! Please log in!</h2>";
            header("Refresh: 3; url = login.php");
        }
        elseif(mysqli_num_rows($raw_login_check_results) == 1){
            echo "<h2>Sorry, this username is already in use!</h2>";
            header("Refresh: 3; url = login.php");
        }
        else{

            foreach($_POST as $p){
                mysqli_real_escape_string($conn, $p);
            }

            foreach($_POST as $p){
                if(!isset($p)){
                    echo "<h2>ERROR: Missing input.</h2>";
                    header("Refresh: 3; url = login.php");
                }
            }
            $_SESSION["post"] = $_POST;

            $set_user_query = "INSERT INTO authorizedusers (username, password, user_type) values
            ('$_POST[username]', '$_POST[password]', '$is_admin');";
            mysqli_query($conn, $set_user_query);
    
            $query = "SELECT id FROM authorizedusers WHERE username='$_POST[username]';";
            $result = mysqli_query($conn, $query);
            $posts = mysqli_fetch_assoc($result);
            $id = $posts["id"];
    
            $query = "INSERT INTO students (user_id, first_name, last_name, phonenumber, email,
            major, campus, education, student_type) values ($id, '$_POST[first]', '$_POST[last]',
            '$_POST[phone]', '$_POST[email]', '$_POST[major]', '$_POST[campuses]', '$_POST[level]', '$_POST[type]');";
            mysqli_query($conn, $query);
            header("Refresh: 3; url = confimation.php");
        }
    }

    include 'inc/footer.php';
?>

