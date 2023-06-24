<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";
require_once "verificarUsuarioExistente.php";
require_once "emailDeConfirmacao.php";



require '../lib/vendor/autoload.php';
$usuario = new Usuario();

function ReceberDadosDoUsuario()
{
    global $usuario;
    $usuario->Usuario = filter_input(INPUT_POST, 'usuario');
    $usuario->Email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $usuario->Senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
}
function InserirDadosNoBanco()
{
    global $usuario;
    global $ConexaoBanco;

    try {

        if (VerificarSeUsuarioExiste()) {
            echo json_encode(array("erro" => "O email já está cadastrado."));
        } 
        else {
            $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha ,:Chave, 3)");
            $Insert->bindParam(':Usuario', $usuario->Usuario);
            $Insert->bindParam(':Email', $usuario->Email);
            $Insert->bindParam(':Senha', $usuario->Senha);
            $usuario->Chave = password_hash($usuario->Email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
            $Insert->bindParam(':Chave', $usuario->Chave);
            $Insert->execute();
            $linhasAfetadas = $Insert->rowCount();

            if ($linhasAfetadas > 0) {
                EnviarEmailDeConfirmacao();
            } 
            else {
                throw new Exception("Erro ao inserir os dados.");
            }
        }

    } 
    catch (PDOException $e) {
        echo json_encode(array("erro" => $e->getMessage()));
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
    ReceberDadosDoUsuario();
    InserirDadosNoBanco();
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