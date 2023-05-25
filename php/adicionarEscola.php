<?php 
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

if(isset($_POST['addEscola']))
{
    $escola = new Escola();
    $escola ->set("nome", $_POST['addEscola']);
    $insert = $ConexaoBanco -> prepare("INSERT INTO escolas VALUES (null,?)");
    $insert -> execute([$escola->get('nome')]);

}
?>