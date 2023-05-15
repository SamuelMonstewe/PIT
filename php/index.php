<?php
$objMotorista = new Motorista;
$Insert;

if(isset($_POST['cadastrar']))
{
    $objMotorista->set("Cpf",$_POST['cpf']);
    $objMotorista->set("Nome",$_POST['nome']);
    $objMotorista->set("Telefone",$_POST['telefone']);
    $objMotorista->set("Rota",$_POST['rotas']);
    $objMotorista->set("Turno",$_POST['turno']);
    $objMotorista->set("Idade",$_POST['idade']);

    $Insert = $ConexaoBanco->prepare("INSERT INTO motorista(cpf, nome, idade, telefone, turno) VALUES(?, ?, ?)");
    $Insert->execute([$obj->get("Cpf"), $obj->get("Nome"), $obj->get("Telefone"), $obj->get("Turno")]);

}



?>