<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

$usuario = new Usuario();

function PreencherDados(){
    global $usuario;    
    $usuario->set("Usuario",$_POST['Usuario']);
    $usuario->set("Email",$_POST['Email']);
    $usuario->set("Senha",$_POST['Senha']);

}
function InserirDados() {
    global $usuario;
    global $ConexaoBanco;

    $Insert = $ConexaoBanco->prepare("INSERT INTO usuarios VALUES (null,? ,? ,?)");
    $Insert->execute([$usuario->get("Usuario"),$usuario->get("Email"),$usuario->get("Senha")]);

}

if(isset($_POST['enviar']))
{
    PreencherDados();
    InserirDados();
}

?>