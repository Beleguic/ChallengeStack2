<?php
namespace App\Core;
use phpMailer\PHPMailer\PHPMailer;
use phpMailer\PHPMailer\SMTP;
use phpMailer\PHPMailer\Exception;
 
require 'asset/phpMailer/src/Exception.php';
require 'asset/phpMailer/src/PHPMailer.php'; 
require 'asset/phpMailer/src/SMTP.php';

class Mailer
{
    private $host;
    private $port ;
    private $username ;
    private $password ;
    private $fromAddress;
    private $fromName;

    public function __construct()
    {
        $this->host = "smtp.gmail.com";
        $this->port = 465;
        $this->password="jzdtvjyrimtcjdyr";
        $this->username = "movinghouseesgi@gmail.com";
        $this->fromAddress = "no-reply-movinghouseesgi@gmail.com";
        $this->fromName = "Moving House";
    }

    public function sendMail($toAddress, $toName, $subject, $body)
    {

        // Créer une nouvelle instance de PHPMailer
        $mail = new PHPMailer();

        // Configurer les paramètres SMTP
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = $this->username;
        $mail->Password = $this->password;

        // Configurer l'expéditeur et le destinataire
        $mail->setFrom($this->fromAddress, $this->fromName);
        $mail->addAddress($toAddress, $toName);

        // Configurer le contenu de l'e-mail
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Envoyer l'e-mail
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}
