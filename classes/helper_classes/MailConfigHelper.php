<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
class MailConfigHelper{

    public static function getMailer():PHPMailer{
        $mail = new PHPMailer();
// $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'b18f7e3d07dec2';
        $mail->Password = 'ca3582313dd975';
        $mail->Port = 2525;
        $mail->SMTPSecure = 'tls';
        $mail->isHTML(true);
        $mail->setFrom('sohamkaralkar123@gmail.com', 'Admin');
        return $mail;
    }
}


