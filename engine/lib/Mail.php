<?php

namespace engine\lib;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function mail($toEmail, $subject, $body){
        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Send using SMTP
            $this->mail->Host       = 'smtp.yandex.ru';                       // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = 'boss@jaxadam.kz';                     // SMTP username
            $this->mail->Password   = 'Adeke741852963';                               // SMTP password
            $this->mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->mail->setFrom('boss@jaxadam.kz', 'Jax Adam');
            $this->mail->addAddress($toEmail);

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = 'Please, use mail with HTML support.';

            $this->mail->send();
            return ['msg' => 'message_send_success'];
        } catch (Exception $e) {
            return [
                'msg' => 'message_error',
                'error' => $this->mail->ErrorInfo
            ];
        }
    }

}