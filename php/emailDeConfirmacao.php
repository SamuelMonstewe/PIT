<?php
require_once "pdo.php";
require_once "verificarUsuarioExistente.php";
require '../lib/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * A função basicamente recebe um objeto do tipo usuário por parâmetro e, usando esse objeto, pegamos dados do usuário para enviar email 
 * de confirmação para ele
 * @param Usuario $usuario
 * @return void
 */
function EnviarEmailDeConfirmacaoMotorista($usuario)
{
    
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
        $mail->addAddress($usuario->getEmail(), $usuario->getNomeUsuario());
        $chave = $usuario->getChave();
        $mail->isHTML(true);
        $mail->Subject = 'CONFIRMAR O EMAIL';
        $mail->Body = "Por favor confirme o email <br> 
                    <a href='http://localhost/PIT/php/confirmar-email-motorista.php?chave=$chave'>Clique aqui </a>";
        $mail->AltBody = "Por favor confirme o email \n
                    'http://localhost/PIT/php/confirmar-email-motorista.php?chave=$chave'";

        $mail->send();
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


function EnviarEmailDeConfirmacaoUsuario($usuario)
{
    
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
        $mail->addAddress($usuario->getEmail(), $usuario->getNomeUsuario());
        $chave = $usuario->getChave();
        $mail->isHTML(true);
        $mail->Subject = 'CONFIRMAR O EMAIL';
        $mail->Body = "Por favor confirme o email <br> 
                    <a href='http://localhost/PIT/php/confirmar-email-cliente.php?chave=$chave'>Clique aqui </a>";
        $mail->AltBody = "Por favor confirme o email \n
                    'http://localhost/PIT/php/confirmar-email-cliente.php?chave=$chave'";

        $mail->send();
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}