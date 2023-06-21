<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../lib/vendor/autoload.php';
$usuario = new Usuario();

function PreencherDados()
{
    global $usuario;
    $usuario->Usuario = filter_input(INPUT_POST, 'usuario' );
    $usuario->Email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $usuario->Senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
}
function InserirDados()
{
    global $usuario;
    global $ConexaoBanco;

    try {

        $query = $ConexaoBanco->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $query->bindParam(':email', $usuario->Email);
        $query->execute();
        $result = $query->fetchColumn();

        if ($result > 0) {
            echo json_encode(array("erro" => "O email já está cadastrado."));
        } 
        else {

            $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha ,:Chave, 3)");
            $Insert->bindParam(':Usuario', $usuario->Usuario);
            $Insert->bindParam(':Email', $usuario->Email);
            $Insert->bindParam(':Senha', $usuario->Senha);
            $chave = password_hash($usuario->Email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
            $Insert->bindParam(':Chave', $chave);
            $Insert->execute();
            $linhasAfetadas = $Insert->rowCount();

            if ($linhasAfetadas > 0) {
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
                    <a href='http://localhost/PIT/php/confirmar-email.php?chave=$chave'>Clique aqui </a>";
                    $mail->AltBody = "Por favor confirme o email \n
                    'http://localhost/PIT/php/confirmar-email.php?chave=$chave'";

                    $mail->send();


                } 
                catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo json_encode(array("mensagem" => "Inserção bem-sucedida!"));

            } else {
                throw new Exception("Erro ao inserir os dados.");
            }
        }

    } catch (PDOException $e) {
        echo json_encode(array("erro" => $e->getMessage()));
    } finally {
        $ConexaoBanco = null;
    }

}
if(isset($_SESSION['mensagem'])){
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
if (isset($_POST['enviar'])) {
    PreencherDados();
    InserirDados();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<script> src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>