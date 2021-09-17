<?php  
    session_start();
    include "inc/header.php"; 
    require "config/db.php";

    if(!isset($_SESSION["loggedin"]) OR !$_SESSION["loggedin"] == TRUE){
        header("Location: login.php");
    }

    $grades_query = "SELECT courses.code, courses.name, grades.grade FROM
        grades JOIN courses ON courses.id = course_id where student_id = $_SESSION[student_id];";
    $grades_result = mysqli_query($conn, $grades_query);
    $grades_posts = mysqli_fetch_all($grades_result, MYSQLI_ASSOC);
?>
    <h1>Grades</h1>
    <table>
        <tr>
            <th>Course</th>
            <th>Grade</th>
        </tr>

        <?php foreach($grades_posts as $g_post): ?>
            <tr>
                <td><?php echo $g_post["code"] . " - " . $g_post["name"] ?></td>
                <td><?php echo $g_post["grade"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
    include "inc/footer.php"; 
?>

