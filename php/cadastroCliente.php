<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Usuario.php";
require_once "verificarUsuarioExistente.php";
require_once "emailDeConfirmacao.php";
require_once "gerarChave.php";

require '../lib/vendor/autoload.php';
$usuario = new Usuario();

function InserirDadosCliente()
{
    global $usuario;
    global $ConexaoBanco;
   
    $usuario->setNomeUsuario($_POST['usuario']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setCpf($_POST['cpf']);
    $usuario->setChave(GerarChave());
    try {

        if (VerificarSeUsuarioExiste($usuario->getNomeUsuario(), $usuario->getEmail())) {
            $mensagem = "O email já está cadastrado!";
            echo json_encode($mensagem);
            exit;
        } 
        else {
            try{
                $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,:Usuario ,:Email ,:Senha ,:Chave, 3, 2, :cpf)");

                $nomeUsuario = $usuario->getNomeUsuario();
                $emailUsuario = $usuario->getEmail();
                $senhaUsuario = $usuario->getSenha();
                $chaveUsuario = $usuario->getChave();
                $cpfUsuario = $usuario->getCpf();
                $Insert->bindParam(':Usuario', $nomeUsuario);
                $Insert->bindParam(':Email', $emailUsuario);
                $Insert->bindParam(':Senha', $senhaUsuario);
                $Insert->bindParam(':Chave', $chaveUsuario);
                $Insert->bindParam(':cpf', $cpfUsuario);
                $Insert->execute();
                $linhasAfetadas = $Insert->rowCount();
    
                if ($linhasAfetadas > 0) {
                    $mensagem = "Enviamos um email para confirmação!";
                    echo json_encode($mensagem);
                    EnviarEmailDeConfirmacaoUsuario($usuario);
                    exit;
                } 
                
            }
            catch(PDOException $e){
                $mensagem = $e->getMessage();
                echo json_encode($mensagem);
                exit;
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

