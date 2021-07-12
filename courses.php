<?php 
    session_start();
    $pageIdentifier = "courses"; 
    include "Inc/header.php"; 
    echo "<p>Courses you're enrolled in.</p>";

    $_SESSION["conn"] = mysqli_connect("localhost", "root", "123456", "manageschool");
    $course_query = "SELECT courses.code, courses.name, courses.description FROM studentscourses JOIN courses ON courses.id = course_id where student_id = {$_SESSION["student_id"]};";
    $course_result = mysqli_query($_SESSION['conn'], $course_query);
    $course_posts = mysqli_fetch_assoc($course_result);

    foreach($course_posts as $c_post){
        echo "$c_post";
    }

    include "Inc/footer.php"; 
?>
