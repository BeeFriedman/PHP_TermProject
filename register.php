<?php
    $_SESSION["pageIdentifier"] = "register";
    include "inc/header.php";
?>
    <div>
        <h2><b>Enter Student Information</b></h2>
        <form class="student_info" action="submission.php" name="studentInfo" method="POST">
            <input class="textBox" type="text" name="username" placeholder="Username" maxlength="20"/>
            <input class="textBox" type="password" name="password" placeholder="Password" maxlength="20"/><br><br>
            <input class="textBox" type="text" name="first" placeholder="First Name" maxlength="20"/>
            <input class="textBox" type="text" name="last" placeholder="Last Name" maxlength="20"/><br><br>
            <input class="textBox" type="tel" name="phone" placeholder="Phone Number" maxlength="12"/>
            <input class="textBox" type="email" name="email" placeholder="Email" maxlength="25"/><br><br>
            <select class="select" name="type">
                <option>New Student</option>
                <option>External Transfer</option>
                <option>Internal Transfer</option>
                <option>Admin</option>
            </select>
            <br><br>
            <div class="radio">
                <label><b><u>Education Level</u></b></label><br>
                <label>Non</label>
                <input type ="radio" name="level" value="Non" checked/><br>
                <label>High School</label>
                <input type ="radio" name="level" value="High School"/><br>
                <label>Associate Degree</label>
                <input type ="radio" name="level" value="Associate Degree"/><br><br>
            <div>
            <input class="button" type="submit" value="Submit"/>
        </form>
    </div>