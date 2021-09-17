<?php 
    session_start();
    include "inc/header.php"; 
    require "config/db.php";

    if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
        header("Location: login.php");
    }
    elseif(filter_has_var(INPUT_POST, "submit")){
        $course_code = substr($_POST["course_select"], 0, 7);
        $student_course_query = "SELECT id FROM courses WHERE code = '{$course_code}'; ";
        $student_course_result = mysqli_query($conn, $student_course_query);
        $student_course_posts = mysqli_fetch_assoc($student_course_result);
        $add_course_query = "INSERT INTO studentscourses(student_id, course_id)
            VALUES ({$_SESSION["student_id"]}, {$student_course_posts["id"]});";
        mysqli_query($conn, $add_course_query);
        header("Location: courses.php");
    }

    $course_query = "SELECT courses.code, courses.name, courses.description FROM 
                    studentscourses JOIN courses ON courses.id = course_id where 
                    student_id = {$_SESSION["user_id"]};";
    $course_result = mysqli_query($conn, $course_query);
    $course_posts = mysqli_fetch_all($course_result, MYSQLI_ASSOC);
    $course_select_query = "SELECT courses.code, courses.name FROM courses;";
    $course_result = mysqli_query($conn, $course_select_query);
    $course_select_posts = mysqli_fetch_all($course_result, MYSQLI_ASSOC);
?>
    <div class="buffer">
        <div class="table_wrapper">
            <table>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th> 
                    <th>Description</th>
                </tr>

                <?php foreach($course_posts as $c_post): ?>
                        <tr>
                            <td><?php echo $c_post["code"]; ?></td>
                            <td><?php echo $c_post["name"]; ?></td>
                            <td><?php echo $c_post["description"]; ?></td>
                        </tr>
                <?php endforeach; ?>
            </table>
            <div class="form">
                <form class="courses" action="courses.php" name="courses" method="POST">
                <h1><u>Select a new course.</u></h1>
                <select class="select" name="course_select">
                    <?php if(count($course_select_posts)> 0): ?>
                        <?php foreach($course_select_posts as $c_s_post): ?>
                        <option><?php echo $c_s_post["code"] . " - " . $c_s_post["name"] ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option>No courses available!</option>
                    <?php endif; ?>
                </select>
                <br><br>
                <input class="button" type="submit" name="submit" value="submit"/>
            </div>
        </div>
    </div>
<?php
    include "inc/footer.php"; 
?>
