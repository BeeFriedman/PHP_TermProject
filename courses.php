<?php 
    session_start();
    $pageIdentifier = "courses"; 
    include "Inc/header.php"; 
    require "Config/db.php";
    echo "<p>Courses you're enrolled in.</p>";

    $course_query = "SELECT courses.code, courses.name, courses.description FROM studentscourses JOIN courses ON courses.id = course_id where student_id = {$_SESSION["student_id"]};";
    $course_result = mysqli_query($conn, $course_query);
    $course_posts = mysqli_fetch_all($course_result, MYSQLI_ASSOC);
?>

    <?php foreach($course_posts as $c_post): ?>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th> 
                <th>Description</th>
            </tr>
            <tr>
                <td><?php echo $c_post["code"]; ?></td>
                <td><?php echo $c_post["name"]; ?></td>
                <td><?php echo $c_post["description"]; ?></td>
            </tr>
        </table>

<?php
    endforeach;
    include "Inc/footer.php"; 
?>
