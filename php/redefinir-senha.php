<?php 
require_once "pdo.php";
function redefinirSenha(){
$senha = $_POST['senhanova'];
$senhaConfirmacao = $_POST['confirmacaosenha'];

}

if(isset($_POST['enviar'])){
    redefinirSenha();
}