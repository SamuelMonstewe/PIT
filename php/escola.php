<?php 

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

function BuscarEscolas(){
    global $ConexaoBanco;
    $select = $ConexaoBanco->query("select * from pit.escolas");

    $escolas = $select->fetchAll();
    
    echo(json_encode($escolas));
}


BuscarEscolas()





?>