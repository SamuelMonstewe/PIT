<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
require_once "pdo.php";
require_once "classes/Usuario.php";

function Logar()
{
    $usuario = new Usuario();
    global $ConexaoBanco;
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);

    try {
       
        $select = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :Senha AND sits_usuarios_id = 1");

        $emailUsuario = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $select->bindParam(':email',$emailUsuario);
        $select->bindParam(':Senha',$senha);
        $select->execute();
        $checar = $select->fetch(PDO::FETCH_ASSOC);
        $sits_usuarios_id = $checar['sits_usuarios_id'];
        $id_motorista = $checar['id'];
        $cpf_motorista = $checar['cpf'];
        
        if($sits_usuarios_id == 1){
            session_start();
            $_SESSION['situacao_login'] = true;
            $_SESSION['id'] = $id_motorista;
            $_SESSION['cpf'] = $cpf_motorista;
        }
        else{
            session_start();
            $_SESSION['situacao_login'] = false;
        }
        if ($checar) {
            echo json_encode($checar);
        } 
        else {  
            http_response_code(401);
            throw new Exception("Senha inválida!");
        }

    }
    catch(Exception $e){
        echo json_encode(array("erro" => $e->getMessage()));
    }
    finally{
        $ConexaoBanco = null;
    }

}
if (isset($_POST['enviar'])) {
    Logar();
}
?>