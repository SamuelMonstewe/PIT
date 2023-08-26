<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Motorista.php";
$Motorista = new Motorista();

function pegarDadosDoFormulario()
{
    global $Motorista;
    $Motorista->setCpf($_POST['cpf']);
    $Motorista->setNome($_POST['nome']);
    $Motorista->setIdade($_POST['idade']);
    $Motorista->setTelefone($_POST['telefone']);
    $Motorista->setTurno($_POST['turno']);
    $Motorista->setEscolas($_POST['idescola']);
    $Motorista->setRota($_POST['rota']);
    $Motorista->setSexo($_POST['sexo']);
    $Motorista->setFotoMotorista(base64_encode(file_get_contents($_FILES['fotomotorista']['tmp_name'])));
    $Motorista->setFotoCarteira(base64_encode(file_get_contents($_FILES['fotocarteira']['tmp_name'])));
    $Motorista->setFotoCRLV(base64_encode(file_get_contents($_FILES['fotocrlv']['tmp_name'])));
}
function inserirDadosNoBanco()
{   
    global $Motorista;
    global $ConexaoBanco;   
    $Insert = $ConexaoBanco->prepare("INSERT INTO motorista VALUES(null, :cpf, :nome, :idade, :telefone, 
                                      :turno, :rota, :sexo, :fotoMotorista, :fotoCarteira, :fotoCRLV)");
    $Insert->bindParam(':cpf', $Motorista->getCpf());
    $Insert->bindParam(':nome', $Motorista->getNome());
    $Insert->bindParam(':idade', $Motorista->getIdade());
    $Insert->bindParam(':telefone', $Motorista->getTelefone());
    $Insert->bindParam(':turno', $Motorista->getTurno());
    $Insert->bindParam(':rota', $Motorista->getRota());
    $Insert->bindParam(':sexo', $Motorista->getSexo());
    $Insert->bindParam(':fotoMotorista', $Motorista->getFotoMotorista());
    $Insert->bindParam(':fotoCarteira', $Motorista->getFotoCarteira());
    $Insert->bindParam(':fotoCRLV', $Motorista->getFotoCRLV());
    $Insert->execute();
  
    $idMotorista = $ConexaoBanco->lastInsertId();
    $Insert2 = $ConexaoBanco->prepare("INSERT INTO escola_motorista VALUES (null,:escolas_id, :id_motorista)");
    $Insert2->bindParam(':escolas_id', $Motorista->getEscolas());
    $Insert2->bindParam(':id_motorista', $idMotorista);
    $Insert2->execute();
}

if (isset($_POST['enviar'])) {

    pegarDadosDoFormulario();
    inserirDadosNoBanco();
}
else{
    http_response_code(400);
    echo("dados incompletos");
}

?>