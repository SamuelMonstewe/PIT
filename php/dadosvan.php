<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

$van = new DadosVan();

function PegarDadosVan()
{
    global $van;
    $van->set("Chassi", $_POST['chassi']);
    $van->set("Placa", $_POST['placaVeiculo']);
    $van->set("Marca", $_POST['marca']);
    $van->set("Modelo", $_POST['modelo']);
    $van->set("Quantlugar", $_POST['capacidadeAlunos']);
    $van->set("LaudoInspecaoVeicular", base64_encode(file_get_contents($_FILES['laudo']['tmp_name'])));
    $van->set("FotoInterna", base64_encode(file_get_contents($_FILES['fotoInterna']['tmp_name'])));
    $van->set("FotoExterna", base64_encode(file_get_contents($_FILES['fotoExterna']['tmp_name'])));
}

function InserirDadosNoBanco()
{
    global $van;
    global $ConexaoBanco;
    $insert = $ConexaoBanco->prepare("INSERT INTO van VALUES (?, ?, ?, ?, ?, null, ?, ?, ?)");
    $insert->execute([
        $van->get("Chassi"),  $van->get("Placa"), $van->get("Marca"), $van->get("Modelo"), $van->get("Quantlugar"),
        $van->get("LaudoInspecaoVeicular"), $van->get("FotoInterna"), $van->get("FotoExterna")
    ]);
}

if (isset($_POST['enviar']))
{
    PegarDadosVan();
    InserirDadosNoBanco();
    echo("foi ss ó");
}
else 
{
    http_response_code(400);
    echo("dados incompletos");
}