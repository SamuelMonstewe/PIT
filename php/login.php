<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";


function Logar()
{

    global $ConexaoBanco;
    $Usuario = $_POST['usuario'];
    $Senha = $_POST['senha'];

    try {
       
        $select = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE Usuario = :Usuario AND senha = :Senha AND sits_usuarios_id = 1");
        $select->bindParam(':Usuario', $Usuario);
        $select->bindParam(':Senha', $Senha);
        $select->execute();
        $checar = $select->fetch(PDO::FETCH_ASSOC);
       
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