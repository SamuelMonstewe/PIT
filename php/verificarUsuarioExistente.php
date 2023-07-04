<?php 
require_once "pdo.php";
require_once "classes.php";

function VerificarSeUsuarioExiste($usuario, $email)
{
    global $ConexaoBanco;
    $SELECT = $ConexaoBanco->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND email = :email");
    $SELECT->bindParam(':usuario', $usuario);
    $SELECT->bindParam(':email', $email);
    $SELECT->execute();
    $LinhasAfetadas = $SELECT->rowCount();

    if ($LinhasAfetadas > 0)
        return true;
    else
        return false;
}