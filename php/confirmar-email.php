<?php
include_once "pdo.php";
session_start();


$chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

if(!empty($chave)){

    global $ConexaoBanco;
    $query_usuarios = "SELECT id FROM usuarios WHERE chave = :chave LIMIT 1";
    $result_usuario = $ConexaoBanco->prepare($query_usuarios);
    $result_usuario-> bindParam(':chave', $chave);
    $result_usuario->execute();

    if(($result_usuario) and ($result_usuario->rowCount() != 0)){
        $_SESSION['mensagem'] = "<div class='alert alert-success' role='alert'> Email confirmado </div>";
        header("Location: ../php/cadastro.php");
    }
    else{
        $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Erro: Endereço inválido.</div> ";
        header("Location: ../php/cadastro.php");
    }

}
else{
    $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Erro: Endereço inválido.</div> ";
    header("Location: ../php/cadastro.php");
}
// else{
//     $_SESSION['mensagem'] = 
//     header("Location: ../php/cadastro.php");
// }