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
        if($select->execute()){
            $checar = $select->fetch(PDO::FETCH_ASSOC);
            $sits_usuarios_id = $checar['sits_usuarios_id'];
            $id = $checar['id'];
            $cpf = $checar['cpf'];
            

            
            if($sits_usuarios_id == 1){
                session_start();
                $_SESSION['situacao_login'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['cpf'] = $cpf;
                $_SESSION['tipo_usuario'] = $checar['tipo_usuario_fk'];

                if($_SESSION['tipo_usuario'] == 1){
                    $cpfMotorista = $_SESSION['cpf'];
                    $SELECT_MOTORISTA = $ConexaoBanco->prepare("SELECT id FROM motorista WHERE cpf = :cpf");
                    $SELECT_MOTORISTA->bindParam(':cpf', $cpfMotorista);
                  
                    if($SELECT_MOTORISTA->execute()){
                        $dadosRetornados = $SELECT_MOTORISTA->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['id_motorista_fk'] = $dadosRetornados['id'];
                    }
                }
            }
            else{
                session_start();
                $_SESSION['situacao_login'] = false;
            }
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