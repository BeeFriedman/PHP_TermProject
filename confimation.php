<?php 
    session_start();
    include "inc/header.php"; 
    require "config/db.php";
?>
<div class="confirm">
    <h2>Congrats! You're form was submitted, you'll get a confimation email in the next few hours</h2>
    <h2>Please make sure that all you information is correct.</h2>
    <h4>Name: <?php echo $_SESSION["post"]["first"]  . " " . $_SESSION["post"]["last"] ?></h4>
    <h4>Phone Number: <?php echo $_SESSION["post"]["phone"]?>&nbsp&nbsp&nbsp Email: <?php echo$_SESSION["post"]["email"]?></h4>
    <h4>Major: <?php echo $_SESSION["post"]["major"]?>&nbsp&nbsp&nbsp Campus: <?php echo$_SESSION["post"]["campuses"]?></h4>
    <h4>Education Level: <?php echo $_SESSION["post"]["level"]?>&nbsp&nbsp&nbsp User-Type: <?php echo$_SESSION["post"]["type"]?></h4>
</div>
 <?php include "inc/footer.php"; ?>