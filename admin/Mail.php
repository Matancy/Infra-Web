<?php

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class Mail
{
    /**
     * Send email with PHPMailer
     * @param String $from Name or Email for the from field (not used for smtp purpose) 
     * @param String $destination Email of destination
     * @param String $replyToEmail Email for reply to usage
     * @param String $replyToName Name to display for reply to
     * @param String $subject 
     * @param String $message
     * @return Void
     */
    public static function sendMail($from, $destination, $replyToEmail, $replyToName, $subject, $message)
    {
        $config = require '../config/config.php';
        try {
            // Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = "mail.infomaniak.com";               // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = "saereseau@cpmtech.fr";           // SMTP username
            $mail->Password   = $config['pass'];           // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enable implicit TLS encryption
            $mail->Port       = 587;               // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom("saereseau@cpmtech.fr", $from);
            $mail->addAddress($destination);     //Add a recipient
            $mail->addReplyTo($replyToEmail, $replyToName);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
