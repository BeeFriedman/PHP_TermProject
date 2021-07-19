<?php
    switch($_SESSION["page_identifier"]) {
        case "dash":
            $class = "dash";
            break;
        case "courses":
            $class = "courses";
            break;
        case "grades":
            $class = "grades";
            break;
        case "inbox":
            $class = "inbox";
            break;
        case "login":
            $class = "login";
            break;
        case "submission":
            $class = "submission";
            break;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>ManageSchool</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="icon" href="assets/favicon.ico" />
    </head>
    <body class="<?php echo $class ?>"> 
        <header class="header">
            <img src="assets/Logo.png" alt="Logo"/>
        </header>
        <?php include "menu.php"; ?>
        <hr>

