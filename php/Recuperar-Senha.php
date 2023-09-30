<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Usuario.php";
require_once "gerarChave.php";
require_once "verificarUsuarioExistente.php";

require '../lib/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function VerificarSeEmailExiste()
{
    global $ConexaoBanco;
    $usuario = new Usuario();
    $usuario->setNomeUsuario($_POST['usuario']);
    $usuario->setEmail($_POST['email']);
    $usuario->setChave(GerarChave());
    try {

        if (!VerificarSeUsuarioExiste($usuario->getNomeUsuario(), $usuario->getEmail())) {
            $mensagem = "Você ainda não possui cadastro no site!";
            echo json_encode($mensagem);
        } 
        else {
            $mensagem = "Enviamos um email de confirmação para redefinição de senha";
            echo json_encode($mensagem);

            $SELECT = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE usuario = :Usuario AND email = :email");

            $nomeUsuario = $usuario->getNomeUsuario();
            $email = $usuario->getEmail();

            $SELECT->bindParam(':Usuario', $nomeUsuario);
            $SELECT->bindParam(':email', $email);
            $SELECT->execute();
            $linhaRetornada = $SELECT->fetch(PDO::FETCH_ASSOC);

            if ($linhaRetornada) {
                $id = $linhaRetornada['id'];
                $UPDATE = $ConexaoBanco->prepare("UPDATE usuarios SET chave = :Chave WHERE id = :Id");
                $chave = $usuario->getChave();
                $UPDATE->bindParam(':Chave', $chave);
                $UPDATE->bindParam(':Id', $id);

                if ($UPDATE->execute()) {
                    $mail = new PHPMailer(true);
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

                    $mail->isHTML(true);
                    $mail->Subject = 'CONFIRMAR O EMAIL';
                    $chave = $usuario->getChave();
                    $mail->Body = "Por favor confirme o email <br> 
                    <a href='http://localhost/PIT/php/confirmar-email-confirmacao.php?chave=$chave'>Clique aqui </a>";
                    $mail->AltBody = "Por favor confirme o email \n
                    'http://localhost/PIT/php/confirmar-email-confirmacao.php?chave=$chave'";

                    $mail->send();

                }
            }

        }

    } catch (Exception $e) {
        echo json_encode(array("erro" => $e->getMessage()));
    }
}
if (isset($_POST['enviar'])) {
    VerificarSeEmailExiste();
}

?>

