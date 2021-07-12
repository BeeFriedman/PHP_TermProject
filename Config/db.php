<?php
    $conn = mysqli_connect("localhost", "root", "123456", "manageschool");

    if(mysqli_connect_errno()){
        echo "Failed to connect to database!" . mysqli_connect_errno();
    }
?>