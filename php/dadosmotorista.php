<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Motorista.php";
require_once "classes/Escola.php";
$motorista = new Motorista();

function pegarDadosDoFormulario()
{
    global $motorista;
    $motorista->setCpf($_POST['cpf']);
    $motorista->setNome($_POST['nome']);
    $motorista->setIdade($_POST['idade']);
    $motorista->setTelefone($_POST['telefone']);
    $motorista->setTurnoManha($_POST['manha']);
    $motorista->setTurnoTarde($_POST['tarde']);
    $motorista->setTurnoNoite($_POST['noite']);
    $motorista->setEscolas($_POST['idescola']);
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
    $InsertMotorista = $ConexaoBanco->prepare("INSERT INTO motorista VALUES(null, :cpf, :nome, :idade, :telefone, :regiao_atuacao, :sexo, :fotoMotorista, :fotoCarteira, :fotoCRLV, 
                                                                    :turnoManha, :turnoTarde, :turnoNoite)");

    $cpf = $motorista->getCpf();
    $nome = $motorista->getNome();
    $idade = $motorista->getIdade();
    $telefone = $motorista->getTelefone();
    $turnoManha = $motorista->getTurnoManha();
    $turnoTarde = $motorista->getTurnoTarde();
    $turnoNoite = $motorista->getTurnoNoite();
    $regiaoAtuacao = strtolower($motorista->getRegiaoDeAtuacao());
    $sexo = $motorista->getSexo();
    $fotoMotorista = $motorista->getFotoMotorista();
    $fotoCarteira =  $motorista->getFotoCarteira();
    $fotoCRLV = $motorista->getFotoCRLV();


    $InsertMotorista->bindParam(':cpf', $cpf);
    $InsertMotorista->bindParam(':nome',  $nome);
    $InsertMotorista->bindParam(':idade', $idade);
    $InsertMotorista->bindParam(':telefone', $telefone);
    $InsertMotorista->bindParam(':regiao_atuacao',  $regiaoAtuacao);
    $InsertMotorista->bindParam(':sexo', $sexo);
    $InsertMotorista->bindParam(':fotoMotorista',  $fotoMotorista);
    $InsertMotorista->bindParam(':fotoCarteira',  $fotoCarteira);
    $InsertMotorista->bindParam(':fotoCRLV', $fotoCRLV);
    $InsertMotorista->bindParam(':turnoManha', $turnoManha);
    $InsertMotorista->bindParam(':turnoTarde', $turnoTarde);
    $InsertMotorista->bindParam(':turnoNoite', $turnoNoite);
    $InsertMotorista->execute();
    // $idMotorista = $ConexaoBanco->lastInsertId();
    // $Insert2 = $ConexaoBanco->prepare("INSERT INTO escola_motorista VALUES (null,?,?)");
   
    
    
}

if (isset($_POST['enviar'])) {
    pegarDadosDoFormulario();
    inserirDadosNoBanco();
}
else{
    echo("dados incompletos");
  
    
}

?>