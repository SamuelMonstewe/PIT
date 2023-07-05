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


function InserirDadosCliente()
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
            $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha ,:Chave, 3, 2)");
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
    finally {
        $ConexaoBanco = null;
    }
}
if (isset($_POST['enviar'])) {
 
    InserirDadosCliente();
}

