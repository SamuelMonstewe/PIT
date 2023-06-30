<?php
require_once "gerarChave.php";
require '../lib/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function EnviarEmailParaRecuperacaoDeSenha($usuario, $email){
    $mail = new PHPMailer(true);
    $chave = GerarChave();
    try {
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '9ffbcf72932b17';
        $mail->Password = 'fb3722320ad301';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        $mail->setFrom('samuel@teste.com', 'Samuel');
        $mail->addAddress($email, $usuario);

        $mail->isHTML(true);
        $mail->Subject = 'CONFIRMAR O EMAIL';
        $mail->Body = "Por favor confirme o email <br> 
                    <a href='http://localhost/PIT/php/confirmar-email-confirmacao.php?chave=$chave'>Clique aqui </a>";
        $mail->AltBody = "Por favor confirme o email \n
                    'http://localhost/PIT/php/confirmar-email-confirmacao.php?chave=$chave'";

        $mail->send();

        
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}