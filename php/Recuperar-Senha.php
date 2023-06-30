<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";
require_once "gerarChave.php";
require_once "verificarUsuarioExistente.php";


function VerificarSeEmailExiste(){
    global $ConexaoBanco;

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $chave = GerarChave();
    try {
       
        if (VerificarSeUsuarioExiste($usuario, $email)) {
            $mensagem = "Você ainda não possui cadastro no site!";
            echo json_encode($mensagem);
        } 
        else {
            $mensagem = "Enviamos um email de confirmação para redefinição de senha";
            echo json_encode($mensagem);

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
                    EnviarEmailParaRecuperacaoDeSenha($usuario, $email);
                }
            }  
        }
        
    }
    catch(Exception $e){
        echo json_encode(array("erro" => $e->getMessage()));
    }
}
if(isset($_POST['enviar'])){
    VerificarSeEmailExiste();
}

?>

