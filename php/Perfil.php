<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
require_once "pdo.php";


function buscarDados()
{
    global $ConexaoBanco;

    $sql = "select nome from motorista";
    $selectNome = $ConexaoBanco->query($sql);

    $nomeUsu = $selectNome->fetchALL();

    echo(json_encode($nomeUsu));
}