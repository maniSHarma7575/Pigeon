<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT . DS . 'api/PHPMailer/src/Exception.php';
require ROOT . DS . 'api/PHPMailer/src/PHPMailer.php';
require ROOT . DS . 'api/PHPMailer/src/SMTP.php';

class Mail
{
    private static $_instance = null;
    private $mail;
    public function __construct($smtpHost, $smtpUsername, $smtpPassword, $smtpSecure, $smtpPort)
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->Host     = $smtpHost;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $smtpUsername;
        $this->mail->Password = $smtpPassword;
        $this->mail->SMTPSecure = $smtpSecure;
        $this->mail->Port     = $smtpPort;
    }
    public static function getInstance($smtpHost, $smtpUsername, $smtpPassword, $smtpSecure, $smtpPort)
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Mail($smtpHost, $smtpUsername, $smtpPassword, $smtpSecure, $smtpPort);
        }
        return self::$_instance;
    }
    public function send($subscriber = [], $email, $name, $subject, $body, $link)
    {
        $this->mail->setFrom($email, 'Pigeon');
        $this->mail->addReplyTo($email, 'Pigeon');
        foreach ($subscriber as $sub) {
            $this->mail->addAddress($sub);
        }
        $this->mail->Subject = $subject;
        $this->mail->isHTML(true);
        $template = emailTemplate();
        $mailContent = $template['first'] . $name . $template['second'] . $subject . $template['third'] . $body . $template['fourth'];
        $this->mail->Body = $mailContent;
        if ($link != '') {
            $this->mail->addAttachment($link);
        }
        if (!$this->mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
    public function sendVerification($name, $email, $token, $work)
    {
        $this->mail->setFrom('sharma.manish7575@gmail.com', 'Pigeon');
        $this->mail->addAddress($email, $name);
        if ($work === "verification") {
            $subject = 'Verify your account';
            $mailContent = "
        <p>Welcome, $name </p>
        <p>Click the following link to verify your account</p>
        <a href='http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/verification?email=$email&token=$token'>Click Here</a>
        <br>
        <p>Note If you are not trying to register into Pigeon, pleases ignore this email</p>
        <br>
        <p>Thanks&Regards,</p>
        <p>Pigeon Team</p>
        ";
        } else {
            $resetPassLink = 'http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/ForgotPassword/reset?email=' . $email . '&token=' . $token;
            $subject = 'Password Update Request';
            $mailContent = 'Dear ' . $name . ',
            <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
            <br/>To reset your password, visit the following link: <a href="' . $resetPassLink . '">Click Here</a>
            <br/><br/>Thanks&Regards,
            <br/>Pigeon Team';
        }
        $this->mail->Subject = $subject;
        $this->mail->isHTML(true);
        $this->mail->Body = $mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }

}
