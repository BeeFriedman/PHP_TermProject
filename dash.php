<?php 
    session_start();
    include "inc/header.php"; 
    require "config/db.php";

    if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
        header("Location: login.php");
    }
    $student_info_query = "SELECT * FROM students WHERE id = $_SESSION[student_id];";
    $student_info_result = mysqli_query($conn, $student_info_query);
    $student_info_posts = mysqli_fetch_all($student_info_result, MYSQLI_ASSOC);
?>
    <div class="buffer">
        <div class="table_wrapper">
            <table class="dash">
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td><?php echo $student_info_posts[0]["first_name"] . " " . $student_info_posts[0]["last_name"]?></td>
                    <td><?php echo $student_info_posts[0]["phonenumber"]?></td>
                    <td><?php echo $student_info_posts[0]["email"]?></td>
                </tr>
            </table>
            <table class="dash">
                <tr>
                    <th>Campus</th>
                    <th>Major</th>
                    <th>Highest Education</th>
                </tr>
                <tr>
                    <td><?php echo $student_info_posts[0]["campus"]?></td>
                    <td><?php echo $student_info_posts[0]["major"]?></td>
                    <td><?php echo $student_info_posts[0]["education"]?></td>
                </tr>
            </table>
        </div>
    </div>
<?php
    include "inc/footer.php"; 
?>
