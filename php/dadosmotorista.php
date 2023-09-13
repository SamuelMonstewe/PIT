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
    $motorista->setIdade($_POST['idade']);
    $motorista->setTelefone($_POST['telefone']);
    $motorista->setTurnoManha($_POST['manha']);
    $motorista->setTurnoTarde($_POST['tarde']);
    $motorista->setTurnoNoite($_POST['noite']);
    $motorista->setRegiaoDeAtuacao($_POST['regiaoAtuacao']);
    $motorista->setSexo($_POST['sexo']);
    $motorista->setFotoMotorista(base64_encode(file_get_contents($_FILES['fotomotorista']['tmp_name'])));
    $motorista->setFotoCarteira(base64_encode(file_get_contents($_FILES['fotocarteira']['tmp_name'])));
    $motorista->setFotoCRLV(base64_encode(file_get_contents($_FILES['fotocrlv']['tmp_name'])));
}
function inserirDadosNoBanco()
{
    global $motorista;
    global $ConexaoBanco;
    $Insert = $ConexaoBanco->prepare("INSERT INTO motorista VALUES(null, :cpf, :idade, :telefone, :regiao_atuacao, :sexo, :fotoMotorista, :fotoCarteira, :fotoCRLV,
                                                                  :turnoManha, :turnoNoite, :turnoTarde)");

    $cpf = $motorista->getCpf();
    $idade = $motorista->getIdade();
    $telefone = $motorista->getTelefone();
    $turnoManha = $motorista->getTurnoManha();
    $turnoTarde = $motorista->getTurnoTarde();
    $turnoNoite = $motorista->getTurnoNoite();
    $regiaoAtuacao = $motorista->getRegiaoDeAtuacao();
    $sexo = $motorista->getSexo();
    $fotoMotorista = $motorista->getFotoMotorista();
    $fotoCarteira =  $motorista->getFotoCarteira();
    $fotoCRLV = $motorista->getFotoCRLV();


    $Insert->bindParam(':cpf', $cpf);
    $Insert->bindParam(':idade', $idade);
    $Insert->bindParam(':telefone', $telefone);
    $Insert->bindParam(':regiao_atuacao', $regiaoAtuacao);
    $Insert->bindParam(':sexo', $sexo);
    $Insert->bindParam(':fotoMotorista',  $fotoMotorista);
    $Insert->bindParam(':fotoCarteira',  $fotoCarteira);
    $Insert->bindParam(':fotoCRLV', $fotoCRLV);
    $Insert->bindParam(':turnoManha', $turnoManha);
    $Insert->bindParam(':turnoNoite', $turnoNoite);
    $Insert->bindParam(':turnoTarde', $turnoTarde);
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