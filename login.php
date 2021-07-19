<?php 
    session_start();
    $_SESSION["page_identifier"] = "dash";  
    include "inc/header.php"; 
?>
    <div class="form">
        <form class="login" action="submission.php" name="login" method="POST">
            <input type="hidden" name="form_type" value="login"/>
            <input class="textBox" type="text" name="username" placeholder="Enter your username" maxlength="20" required/><br><br>
            <input class="textBox" type="password" name="password" placeholder="Enter your password" maxlength="20" required/><br><br>
            <input class="button" type="submit" value="Submit"/><br><br>
            <button class="button">
                <a href="register.php">New user? Register</a>
            </button>
        </form>
    </div>
<?php include "inc/footer.php"; ?>


