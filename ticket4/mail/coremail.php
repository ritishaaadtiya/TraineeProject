<?php



$toemail = 'ritisha.aadtiya@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email sent without PHPMailer.';
$headers = "From: ritishaaadtiya28@gmail.com\r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// SMTP configuration for Gmail (using your Gmail SMTP server)
$smtp_server = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_user = 'ritishaaadtiya28@gmail.com';
$smtp_pass = 'gyak pnbo dfgi gljb'; 

// Attempt to send email using the mail() function
if(mail($toemail, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    echo 'Error sending email.';
}


