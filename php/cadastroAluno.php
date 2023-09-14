<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes/Aluno.php";

$aluno = new Aluno(); 

function pegarDadosDoFormulario()
{   
    global $aluno;
    $aluno->setNomeAluno($_POST['nome']);
    $aluno->setIdade($_POST['idade']);
    $aluno->setNomeEscola($_POST['escola']);
    $aluno->setSexo($_POST['sexo']);    
}

function inserirDadosNoBanco()
{
    global $aluno;
    global $ConexaoBanco;
    $insert = $ConexaoBanco->prepare("INSERT INTO aluno VALUES(null, :nome, :idade, :escola, :sexo)");

    $NomeAluno = $aluno->getNomeAluno();
    $idade = $aluno->getIdade();
    $NomeEscola = $aluno->getNomeEscola();
    $sexo = $aluno->getSexo();

    $insert->bindParam(':nome', $NomeAluno);
    $insert->bindParam(':idade', $idade);
    $insert->bindParam(':escola', $NomeEscola);
    $insert->bindParam(':sexo', $sexo);
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