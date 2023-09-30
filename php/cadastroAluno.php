<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Aluno.php";

$aluno = new Aluno(); 

function pegarDadosDoFormulario()
{   
    global $aluno;
    $aluno->setCpfResponsavel($_POST['cpf']);
    $aluno->setNomeAluno(strtoupper($_POST['nome']));
    $aluno->setIdade($_POST['idade']);
    $aluno->setRegiaoOndeMora($_POST['regiao']);
    $aluno->setNomeEscola($_POST['escola']);
    $aluno->setSexo($_POST['sexo']);    
}

function inserirDadosNoBanco()
{
    global $aluno;
    global $ConexaoBanco;
    $insert = $ConexaoBanco->prepare("INSERT INTO aluno VALUES(null, :nome, :idade, :escola, :regiao_onde_mora, :sexo, :id_responsavel_fk)");

    $SELECT_USUARIO = $ConexaoBanco->prepare("SELECT id FROM usuarios WHERE cpf = :cpf");
    $CpfResponsavel = $aluno->getCpfResponsavel();
    $SELECT_USUARIO->bindParam(':cpf', $CpfResponsavel);
    $SELECT_USUARIO->execute();
    $dadosRetornados = $SELECT_USUARIO->fetch(PDO::FETCH_ASSOC);
    $id_responsavel_fk = $dadosRetornados['id'];

    
    $NomeAluno = $aluno->getNomeAluno();
    $idade = $aluno->getIdade();
    $NomeEscola = $aluno->getNomeEscola();
    $RegiaoOndeMora = $aluno->getRegiaoOndeMora();
    $sexo = $aluno->getSexo();
    

    $insert->bindParam(':nome', $NomeAluno);
    $insert->bindParam(':idade', $idade);
    $insert->bindParam(':escola', $NomeEscola);
    $insert->bindParam(':regiao_onde_mora', $RegiaoOndeMora);
    $insert->bindParam(':sexo', $sexo);
    $insert->bindParam(':id_responsavel_fk', $id_responsavel_fk);
    $insert->execute();
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