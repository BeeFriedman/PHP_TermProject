<?php
    $_SESSION["page_identifier"] = "register";
    require "config/db.php";
    include "inc/header.php";

    $get_majors_query = "SELECT name FROM majors";
    $raw_majors_result = mysqli_query($conn, $get_majors_query);
    $majors_result_array = mysqli_fetch_all($raw_majors_result, MYSQLI_ASSOC);

    $get_campuses_query = "SELECT name, state, country FROM campuses";
    $raw_campuses_result = mysqli_query($conn, $get_campuses_query);
    $campuses_result_array = mysqli_fetch_all($raw_campuses_result, MYSQLI_ASSOC);
?>
    <div class="form">
        <h2><b>Enter Student Information</b></h2>
        <form class="student_info" action="submission.php" name="studentInfo" method="POST">
            <input type="hidden" name="form_type" value="registration"/>       
            <input class="textBox" type="text" name="username" placeholder="Username" maxlength="20" required/>
            <input class="textBox" type="password" name="password" placeholder="Password" maxlength="20" required/><br><br>
            <input class="textBox" type="text" name="first" placeholder="First Name" maxlength="20" required/>
            <input class="textBox" type="text" name="last" placeholder="Last Name" maxlength="20" required/><br><br>
            <input class="textBox" type="tel" name="phone" placeholder="Phone Number" maxlength="12" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>
            <input class="textBox" type="email" name="email" placeholder="Email" maxlength="25" required/><br><br>
            <select class="select" name="type" required>
                <option selected disabled>Select user type</option>
                <option>New Student</option>
                <option>External Transfer</option>
                <option>Internal Transfer</option>
                <option>Admin</option>
            </select>
            <select class="select" name="major" required>
                <option selected disabled>Select a major<t/option>
                <?php foreach($majors_result_array as $major): ?>
                <option><?php echo $major["name"]; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <select class="select" id="campus" name="campuses" required>
                <option selected disabled>Select a campus<t/option>
                <?php foreach($campuses_result_array as $campus): ?>
                <option><?php echo $campus["name"] . ", " . (($campus["state"] != "NA")? $campus["state"] . ", " : "") . 
                            $campus["country"]; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <div class="radio" name="level">
                <label><b><u>Education Level</u></b></label><br>
                <label>Non</label>
                <input type ="radio" name="level" value="Non" checked/><br>
                <label>High School</label>
                <input type ="radio" name="level" value="High School"/><br>
                <label>Associate Degree</label>
                <input type ="radio" name="level" value="Associate Degree"/><br><br>
            </div>
            <input class="button" type="submit" value="Submit"/>
        </form>
    </div>
<?php include "inc/footer.php"; ?>