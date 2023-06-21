<?php
include_once "pdo.php";
session_start();


$chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

if(!empty($chave)){

    global $ConexaoBanco;
    $SELECT = "SELECT id FROM usuarios WHERE chave = :chave LIMIT 1";
    $resultadoDaConsulta = $ConexaoBanco->prepare($SELECT);
    $resultadoDaConsulta-> bindParam(':chave', $chave);
    $resultadoDaConsulta->execute();

    if(($resultadoDaConsulta) and ($resultadoDaConsulta->rowCount() != 0)){
        $linhaRetornada = $resultadoDaConsulta->fetch(PDO::FETCH_ASSOC);
        extract($linhaRetornada);
      
        $updateUsuario = "UPDATE usuarios SET sits_usuarios_id = 1, chave=:chave WHERE id = " . strval($id);
        $update = $ConexaoBanco->prepare($updateUsuario);
        $chave = NULL;
        $update->bindParam(':chave', $chave);
        if($update->execute()){
            $_SESSION['mensagem'] = "<div class='alert alert-success' role='alert'> Email confirmado </div>";
            header("Location: ../php/cadastro.php");
        }
        else{
            $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Erro: Email nao confirmado.</div> ";
            header("Location: ../php/cadastro.php");      
        }
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
