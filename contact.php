<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yourcenter@gmail.com'; // learnwithimtiazskd@gmail.com
        $mail->Password = 'your_app_password';   // wjnh nipt ejkz hqmn
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('yourcenter@gmail.com','My Center');
        $mail->addAddress('yourcenter@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "Contact Form Message from $name";
        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        echo 'Message sent successfully';
    } catch (Exception $e) {
        echo "Mailer Error: ".$mail->ErrorInfo;
    }
}
?>