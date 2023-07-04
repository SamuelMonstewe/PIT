<?php
include_once "pdo.php";
session_start();

$chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

if(!empty($chave)){
    global $ConexaoBanco;
    $SELECT = "SELECT * FROM usuarios WHERE chave = :chave LIMIT 1";
    $resultadoDaConsulta = $ConexaoBanco->prepare($SELECT);
    $resultadoDaConsulta->bindParam(':chave', $chave);
    $resultadoDaConsulta->execute();

    if(($resultadoDaConsulta) and ($resultadoDaConsulta->rowCount() != 0)){
        $linhaRetornada = $resultadoDaConsulta->fetch(PDO::FETCH_ASSOC);
        $id = $linhaRetornada['id'];
        $updateUsuario = "UPDATE usuarios SET chave = :chave WHERE id = :id";
        $UPDATE = $ConexaoBanco->prepare($updateUsuario);
        $chave = NULL;
        $UPDATE->bindParam(':id', $id);
        $UPDATE->bindParam(':chave', $chave);

        if($UPDATE->execute()){
            $_SESSION['mensagem'] = "<div class='alert alert-success' role='alert'> Email confirmado<br>
            <a href='../HTML/Alterar-Senha.html'>Clique aqui para redefinir a senha!</a></div>";
            header("Location: ../php/cadastro.php");
        }
        else{
            $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Email não confirmado </div>";
            header("Location: ../php/cadastro.php");
        }
    }
    else{
        $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Erro: Endereço inválido.</div> ";
        header("Location: ../php/cadastro.php");
    }
}
else{
    $_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'> Erro: A chave está vazia</div> ";
    header("Location: ../php/cadastro.php");
}