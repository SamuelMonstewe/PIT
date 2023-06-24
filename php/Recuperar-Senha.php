<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

function VerificarSeUsuarioExiste(){
    global $ConexaoBanco;

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    
    try {
       
        $select = $ConexaoBanco->prepare("SELECT * FROM pit.usuarios WHERE Usuario = :Usuario AND Email = :email");
        $select->bindParam(':Usuario', $usuario);
        $select->bindParam(':email',  $email);
        $select->execute();
       
        $linhasAfetadas = $select->rowCount();

        if ($linhasAfetadas == 0) {
            $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Erro: Esse email não está logado em nosso sistema!</div> ";
            header("Location: ../php/cadastro.php");
        } 
        else {
            
        }

    }
    catch(Exception $e){
        echo json_encode(array("erro" => $e->getMessage()));
    }
    finally{
        $ConexaoBanco = null;
    }
}

if(isset($_POST['enviar']))
{
    ReceberDadosDoUsuario();
    VerificarSeUsuarioExiste();
  
}

