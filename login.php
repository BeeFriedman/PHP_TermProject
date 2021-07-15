<?php 
    session_start();
    $_SESSION["page_identifier"] = "login";  
    include "inc/header.php"; 
?>
    <div class="login">
        <form action="submission.php" name="login" method="POST">
            <input type="hidden" name="form_type" value="login"/>
            <input class="textBox" type="text" name="username" placeholder="Enter your username" maxlength="20"/>
            <input class="textBox" type="password" name="password" placeholder="Enter your password" maxlength="20"/><br><br>
            <input class="button" type="submit" value="Submit"/>
        </form>
        <button class="button_register">
            <a href="register.php">New user? Register</a>
        </button>
    </div>
<?php include "inc/footer.php"; ?>


