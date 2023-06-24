<?php 
require_once "pdo.php";
require_once "classes.php";

function VerificarSeUsuarioExiste()
{
    global $ConexaoBanco;
    global $usuario;
    $query = $ConexaoBanco->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
    $query->bindParam(':email', $usuario->Email);
    $query->execute();
    $result = $query->fetchColumn();

    if ($result > 0)
        return true;
    else
        return false;
}