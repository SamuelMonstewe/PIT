<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

$usuario = new Usuario();

function PreencherDados(){
    global $usuario;    
    $usuario->Usuario = $_POST['usuario'];
    $usuario->Email = $_POST['email'];
    $usuario->Senha = $_POST['senha'];

}
function InserirDados() {
    global $usuario;
    global $ConexaoBanco;

    $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,? ,? ,?)");
    $Insert->execute([$usuario->Usuario,$usuario->Email,$usuario->Senha]);

}

if(isset($_POST['enviar']))
{
    PreencherDados();
    InserirDados();
}

?>