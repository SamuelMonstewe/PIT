<?php
require_once "pdo.php";

/**
 * Recebe um cpf como parametro para usarmos no select e verificar se este cpf existe em nossa base de dados
 * @param mixed $cpf
 * 
 */
function verificarSeCpfExisteNoBanco($cpf){
    global $ConexaoBanco;
    $SELECT_USUARIO = $ConexaoBanco->prepare("SELECT cpf FROM usuarios WHERE cpf = :cpf");
    $SELECT_USUARIO->bindParam(':cpf', $cpf);

    if($SELECT_USUARIO->execute()){
      
        if($SELECT_USUARIO->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
    }
}