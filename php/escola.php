<?php 

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
require_once "pdo.php";
require_once "classes.php";

function BuscarEscolas(){
    global $ConexaoBanco;
    $sql = "select * from pit.escolas";
    $select = $ConexaoBanco->query($sql);

    $escolas = $select->fetchAll();
    
    echo(json_encode($escolas));
}


BuscarEscolas()





?>