<?php
    switch($pageIdentifier) {
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
        case "login":
            $class = "login";
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
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link rel="icon" href="Assets//favicon.ico" />
    </head>
    <body class="<?php echo $class ?>"> 
        <header class="header">
            <img src="Assets/Logo.png" alt="Logo"/>
        </header>
        <?php include "menu.php"; ?>
        <hr>

