<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Motorista.php";
$motorista = new Motorista();

function pegarDadosDoFormulario()
{
    global $motorista;
    $motorista->setCpf($_POST['cpf']);
    $motorista->setNome($_POST['nome']);
    $motorista->setIdade($_POST['idade']);
    $motorista->setTelefone($_POST['telefone']);
    $motorista->setTurno($_POST['turno']);
    $motorista->setEscolas($_POST['idescola']);
    $motorista->setRota($_POST['rota']);
    $motorista->setSexo($_POST['sexo']);
    $motorista->setFotoMotorista(base64_encode(file_get_contents($_FILES['fotomotorista']['tmp_name'])));
    $motorista->setFotoCarteira(base64_encode(file_get_contents($_FILES['fotocarteira']['tmp_name'])));
    $motorista->setFotoCRLV(base64_encode(file_get_contents($_FILES['fotocrlv']['tmp_name'])));
}
function inserirDadosNoBanco()
{
    global $motorista;
    global $ConexaoBanco;
    $Insert = $ConexaoBanco->prepare("INSERT INTO motorista VALUES(null, :cpf, :nome, :idade, :telefone, :turno, :rota, :sexo, :fotoMotorista, :fotoCarteira, :fotoCRLV)");

    $cpf = $motorista->getCpf();
    $nome = $motorista->getNome();
    $idade = $motorista->getIdade();
    $telefone = $motorista->getTelefone();
    $turno =  $motorista->getTurno();
    $rota = $motorista->getRota();
    $sexo = $motorista->getSexo();
    $fotoMotorista = $motorista->getFotoMotorista();
    $fotoCarteira =  $motorista->getFotoCarteira();
    $fotoCRLV = $motorista->getFotoCRLV();


    $Insert->bindParam(':cpf', $cpf);
    $Insert->bindParam(':nome',  $nome);
    $Insert->bindParam(':idade', $idade);
    $Insert->bindParam(':telefone', $telefone);
    $Insert->bindParam(':turno', $turno);
    $Insert->bindParam(':rota',  $rota);
    $Insert->bindParam(':sexo', $sexo);
    $Insert->bindParam(':fotoMotorista',  $fotoMotorista);
    $Insert->bindParam(':fotoCarteira',  $fotoCarteira);
    $Insert->bindParam(':fotoCRLV', $fotoCRLV);
    $Insert->execute();
    // $idMotorista = $ConexaoBanco->lastInsertId();
    // $Insert2 = $ConexaoBanco->prepare("INSERT INTO escola_motorista VALUES (null,?,?)");
   

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