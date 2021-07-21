<?php
    include "inc/header.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:/xampp/htdocs/PHPMailer/src/Exception.php';
    require 'C:/xampp/htdocs/PHPMailer/src/PHPMailer.php';
    require 'C:/xampp/htdocs/PHPMailer/src/SMTP.php';

    if(filter_has_var(INPUT_POST, "submit")){
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $msg = htmlspecialchars($_POST["Message"]);

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = getenv('TEST_EMAIL');
        $mail->Password = getenv('TEST_PASSWORD');
        $mail->setFrom(getenv('TEST_EMAIL'));
        $mail->addAddress(getenv('TEST_EMAIL'));
        $mail->Subject = "Inquiry By " . $name;
        $mail->Body = "From: $email\n" . "$msg";

        if (!$mail->send()) {
            echo "ERROR: " . $mail->ErrorInfo;
        } else {
            echo "<h2 class='success'>Your message was successfully submitted! Our support team will get back to you within 3 business days.</h2>";
        }
    }
?>
    <div class="buffer">
        <div class="form">
            <h1><b>Contact Form</b></h1>
            <form class="contact_form"  action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="contact" method="POST">  
                <input class="textBox" type="text" name="name" placeholder="Name" maxlength="20" required/><br><br>
                <input class="textBox" type="email" name="email" placeholder="Email" maxlength="30" required/><br><br>
                <textarea class="textArea" type="text" name="Message" placeholder="Enter your message here." required></textarea><br><br>
                <div class="button_holder">
                    <input class="button" name="submit" type="submit" value="Send"/>
                </div>
            </form>
        </div>
    </div>
<?php include "inc/footer.php" ?>
