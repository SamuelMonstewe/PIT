<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

$usuario = new Usuario();
function Logar(){
    global $ConexaoBanco;
    global $usuario;
    $usuario->Usuario =$_POST['usuario'];
    $usuario->Senha=$_POST['senha'];
    $select = $ConexaoBanco->query("select * from pit.usuarios where usuario = '$usuario->Usuario' and senha = '$usuario->Senha'");
    $checar = $select->fetchAll();

    if(isset($checar[0])){
        echo(json_encode($checar[0]));
    }
    else
    {
        http_response_code(401);
        echo("Senha invalida!");
    }

}

if(isset($_POST['enviar']))
{
    Logar();
}
?>