<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";
require_once "verificarUsuarioExistente.php";
require_once "emailDeConfirmacao.php";
require_once "gerarChave.php";

require '../lib/vendor/autoload.php';

function InserirDadosMotorista()
{
    global $usuario;
    global $ConexaoBanco;
    $usuario = new Usuario();
    $usuario->Usuario = filter_input(INPUT_POST, 'usuario');
    $usuario->Email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $usuario->Senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    try {

        if (VerificarSeUsuarioExiste($usuario->Usuario, $usuario->Email)) {
            $mensagem = "O email já está cadastrado!";
            echo json_encode($mensagem);
            exit;
        } 
        else {
            $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha ,:Chave, 3, 1)");
            $Insert->bindParam(':Usuario', $usuario->Usuario);
            $Insert->bindParam(':Email', $usuario->Email);
            $Insert->bindParam(':Senha', $usuario->Senha);
            $usuario->Chave = GerarChave();
            $Insert->bindParam(':Chave', $usuario->Chave);
            $Insert->execute();
            $linhasAfetadas = $Insert->rowCount();

            if ($linhasAfetadas > 0) {
                $mensagem = "Enviamos um email para confirmação!";
                echo json_encode($mensagem);
                EnviarEmailDeConfirmacao();
                exit;
            } 
            else {
                throw new Exception("Erro ao inserir os dados.");
            }
        }

    } 
    catch (PDOException $e) {
        $mensagem = $e->getMessage();
        echo json_encode($mensagem);
        exit;
    } 
    catch (Exception $e) {
        $mensagem = "Erro ao inserir os dados.";
        echo json_encode($mensagem);
        exit;
    }
    finally {
        $ConexaoBanco = null;
    }
}
if (isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
if (isset($_POST['enviar'])) {
 
     InserirDadosMotorista();
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

    <script> src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin = "anonymous" ></script>
</body>

</html>