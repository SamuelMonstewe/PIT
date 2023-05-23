<?php
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";
$objMotorista = new Motorista();
$Insert;


function pegarDadosDoFormulario()
{
    global $objMotorista;
    $objMotorista->set("Cpf", $_POST['cpf']);
    $objMotorista->set("Nome", $_POST['nome']);
    $objMotorista->set("Idade", $_POST['idade']);
    $objMotorista->set("Telefone", $_POST['telefone']);
    $objMotorista->set("Turno", $_POST['turno']);
    $objMotorista->set("Escolas", $_POST['escolas']);
    $objMotorista->set("Rota", $_POST['rota']);
    $objMotorista->set("Sexo", $_POST['sexo']);

}
function inserirDadosNoBanco()
{
    global $objMotorista;
    global $ConexaoBanco;
    $Insert = $ConexaoBanco->prepare("INSERT INTO motorista VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $Insert->execute([$objMotorista->get("Cpf"), $objMotorista->get("Nome"), $objMotorista->get("Idade"), $objMotorista->get("Telefone"),  $objMotorista->get("Turno"), $objMotorista->get("Escolas"), $objMotorista->get("Rota"), $objMotorista->get("Sexo")]);
}

if(isset($_POST['enviar']))
{
    pegarDadosDoFormulario();
    inserirDadosNoBanco();

}



?>