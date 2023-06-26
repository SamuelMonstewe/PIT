<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";
require '../lib/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function VerificarSeUsuarioExiste(){
    global $ConexaoBanco;

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
   
    try {
       
        $SELECT = $ConexaoBanco->prepare("SELECT * FROM pit.usuarios WHERE Usuario = :Usuario AND email = :email");
        $SELECT->bindParam(':Usuario', $usuario);
        $SELECT->bindParam(':email',  $email);
        $SELECT->execute();
       
        $linhasAfetadas = $SELECT->rowCount();

        if ($linhasAfetadas == 0) {
            $mensagem = "Você ainda não possui cadastro no site!";
            echo json_encode($mensagem);
        } 
        else {
            $mensagem = "Enviamos um email de confirmação para redefinição de senha";
            echo json_encode($mensagem);

            $chave = password_hash($email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
            $SELECT = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE usuario = :Usuario AND email = :email");
            $SELECT->bindParam(':Usuario', $usuario);
            $SELECT->bindParam(':email', $email);
            $SELECT->execute();
            $linhaRetornada = $SELECT->fetch(PDO::FETCH_ASSOC);

            if($linhaRetornada){
                $id = $linhaRetornada['id'];
                $UPDATE = $ConexaoBanco->prepare("UPDATE usuarios SET chave = :Chave WHERE id = :Id");
                $UPDATE->bindParam(':Chave', $chave);
                $UPDATE->bindParam(':Id', $id);

                if($UPDATE->execute()){
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
            }  
        }
        
    }
    catch(Exception $e){
        echo json_encode(array("erro" => $e->getMessage()));
    }
}
if(isset($_POST['enviar'])){
    VerificarSeUsuarioExiste();
}

?>

