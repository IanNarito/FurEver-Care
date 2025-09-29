<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'iannarito116@gmail.com';
    $mail->Password   = ''; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587;

    $mail->setFrom('iannarito116@gmail.com', 'Mailer');
    $mail->addAddress('micnarito@tip.edu.ph'); 

        // Content
    $mail->isHTML(true);
    $mail->Subject = "Contact Form: " . $subject;
    $mail->Body    = "
        <h3>New Contact Form Message</h3>
        <p><b>Name:</b> {$name}</p>
        <p><b>Email:</b> {$email}</p>
        <p><b>Message:</b><br>{$message}</p>
    ";

        $mail->send();
        echo "<script>alert('Message has been sent successfully!'); window.location.href='contact.html';</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
