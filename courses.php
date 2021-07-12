<?php 
    session_start();
    $_SESSION["pageIdentifier"] = "courses"; 
    include "inc/header.php"; 
    require "config/db.php";
    echo "<h1><u>Courses you're enrolled in.</u></h1>";

    $course_query = "SELECT courses.code, courses.name, courses.description FROM 
                    studentscourses JOIN courses ON courses.id = course_id where 
                    student_id = {$_SESSION["student_id"]};";
    $course_result = mysqli_query($conn, $course_query);
    $course_posts = mysqli_fetch_all($course_result, MYSQLI_ASSOC);
    $course_select_query = "SELECT courses.code, courses.name FROM courses;";
    $course_result = mysqli_query($conn, $course_select_query);
    $course_select_posts = mysqli_fetch_all($course_result, MYSQLI_ASSOC);
?>
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
    
    <h1><u>Select a new course.</u></h1>
    <select name="course_select">
        <?php foreach($course_select_posts as $c_s_post): ?>
        <option><?php echo $c_s_post["code"] . "-" . $c_s_post["name"] ?></option>
        <?php endforeach; ?>
    </select>
<?php
    include "inc/footer.php"; 
?>
