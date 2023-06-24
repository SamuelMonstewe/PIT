<?php
require_once "pdo.php";
require_once "classes.php";
require_once "verificarUsuarioExistente.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function EnviarEmailDeConfirmacao()
{
    global $usuario;
    global $ConexaoBanco;

    $mail = new PHPMailer(true);

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
        $mail->addAddress($usuario->Email, $usuario->Usuario);

        $mail->isHTML(true);
        $mail->Subject = 'CONFIRMAR O EMAIL';
        $mail->Body = "Por favor confirme o email <br> 
                    <a href='http://localhost/PIT/php/confirmar-email.php?chave=$usuario->Chave'>Clique aqui </a>";
        $mail->AltBody = "Por favor confirme o email \n
                    'http://localhost/PIT/php/confirmar-email.php?chave=$usuario->Chave'";

        $mail->send();
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}